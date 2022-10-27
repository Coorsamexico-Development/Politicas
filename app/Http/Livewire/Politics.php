<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Politic;
use App\Models\Tipopolitica;
use App\Models\Status_politica;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Politics extends Component
{
	use WithFileUploads;
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $namepolitica, $description, $type_politic, $id_statu, $autor, $imagePolitic, $pdf;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.politics.view', [
            'politics' => Politic::select('politics.id', 'politics.namepolitica',
			'politics.description', 't.name as type_politic', 's.name as status', 'politics.created_at',
			'politics.updated_at','politics.autor',
			'politics.imagePolitic', 'politics.pdf',
't.id as id_type',
's.id as id_statu')
						->orWhere('namepolitica', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->orWhere('t.name', 'LIKE', $keyWord)
						->orWhere('s.name', 'LIKE', $keyWord)
						->orWhere('autor', 'LIKE', $keyWord)
						->orWhere('imagePolitic', 'LIKE', $keyWord)
						->orWhere('pdf', 'LIKE', $keyWord)
						->join('tipopoliticas as t','t.id','=','politics.type_politic')
						->join('status_politicas as s','s.id','=', 'politics.id_statu')
						->paginate(10),

			'tipopoliticas'=>Tipopolitica::all(),
			'status'=>Status_politica::all()
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->namepolitica = null;
		$this->description = null;
		$this->type_politic = null;
		$this->id_statu = null;
		$this->autor = null;
		$this->imagePolitic = null;
		$this->pdf = null;
    }

    public function store()
    {
        $this->validate([
		'namepolitica' => 'required',
		'description' => 'required',
		'type_politic' => 'required',
		'id_statu' => 'required',
		'imagePolitic' => 'required|mimes:jpeg,png,jpg|max:102400',
		'pdf' => 'required',
		'autor' => 'required',
        ]);


		
		
		$disk = Storage::disk('gcs');
        $this->imagePolitic  = $disk->url($this->imagePolitic->store('imagePolitic', 'gcs'));
		

		$this->pdf = $disk->url($this->pdf->store('pdf', 'gcs'));
		

        Politic::create([ 
			'namepolitica' => $this-> namepolitica,
			'description' => $this-> description,
			'type_politic' => $this-> type_politic,
			'id_statu' => $this-> id_statu,
			'autor' => $this-> autor,
			'imagePolitic' => $this-> imagePolitic,
			'pdf' => $this-> pdf
		
        ]);
	
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Politica creada correctamente.');
    }

    public function edit($id)
    {
        $record = Politic::findOrFail($id);

        $this->selected_id = $id; 
		$this->namepolitica = $record-> namepolitica;
		$this->description = $record-> description;
		$this->type_politic = $record-> type_politic;
		$this->id_statu = $record-> id_statu;
		$this->autor = $record-> autor;
		$this->imagePolitic = null;
		$this->pdf = null;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'namepolitica' => 'required',
		'description' => 'required',
		'type_politic' => 'required',
		'id_statu' => 'required',
		'autor' => 'required',
		 'imagePolitic' => 'nullable|mimes:jpeg,png,jpg|max:102400',
		 'pdf' => 'nullable',
        ]);

        if ($this->selected_id) {
			$record = Politic::find($this->selected_id);
			if(!empty($this->imagePolitic)){
				Storage::disk('gcs')->delete($record->imagePolitic);
				$record->imagePolitic = $this->imagePolitic->store('imagePolitic', 'public');
			}
			if(!empty($this->pdf)){
				Storage::disk('gcs')->delete($record->pdf);	
				$record->pdf = $this->pdf->store('pdf', 'public');
	
			}

            $record->update([ 
			'namepolitica' => $this->namepolitica,
			'description' => $this->description,
			'type_politic' => $this->type_politic,
			'id_statu' => $this->id_statu,
			'autor' => $this->autor,
			'imagePolitic' => $record->imagePolitic,
			'pdf' => $record->pdf
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Politica actualizada correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Politic::find($id);
			Storage::disk('gcs')->delete($record->imagePolitic);
			Storage::disk('gcs')->delete($record->pdf);
            $record->delete();
        }
    }
}

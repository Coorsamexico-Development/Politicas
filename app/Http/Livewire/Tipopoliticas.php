<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipopolitica;

class Tipopoliticas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $status;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipopoliticas.view', [
            'tipopoliticas' => Tipopolitica::latest()
						->orWhere('name', 'LIKE', $keyWord)
/* 						->orWhere('status', 'LIKE', $keyWord) */
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
/* 		'status' => 'required', */
        ]);

        Tipopolitica::create([ 
			'name' => $this-> name,
/* 			'status' => $this-> status */
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tipo de política creada correctamente.');
    }

    public function edit($id)
    {
        $record = Tipopolitica::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
/* 		$this->status = $record-> status; */
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
	/* 	'status' => 'required', */
        ]);

        if ($this->selected_id) {
			$record = Tipopolitica::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			/* 'status' => $this-> status */
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tipo de política modificada correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Tipopolitica::where('id', $id);
            $record->delete();
        }
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Finiquito;
use Illuminate\Http\Request;

class Finiquitos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidop, $apellidom, $fechaBaja, $fecha, $ejercido;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.finiquitos.view', [
            'finiquitos' => Finiquito::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellidop', 'LIKE', $keyWord)
						->orWhere('apellidom', 'LIKE', $keyWord)
						->orWhere('fechaBaja', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('ejercido', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->apellidop = null;
		$this->apellidom = null;
		$this->fechaBaja = null;
		$this->fecha = null;
		/* $this->ejercido = null; */
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidop' => 'required',
		'apellidom' => 'required',
		'fechaBaja' => 'required',
		'fecha' => 'required',
		/* 'ejercido' => 'required', */
        ]);

        Finiquito::create([ 
			'nombre' => $this-> nombre,
			'apellidop' => $this-> apellidop,
			'apellidom' => $this-> apellidom,
			'fechaBaja' => $this-> fechaBaja,
			'fecha' => $this-> fecha,
			/* 'ejercido' => $this-> ejercido */
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Finiquito .');
    }

    public function edit($id)
    {
        $record = Finiquito::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellidop = $record-> apellidop;
		$this->apellidom = $record-> apellidom;
		$this->fechaBaja = $record-> fechaBaja;
		$this->fecha = $record-> fecha;
	/* 	$this->ejercido = $record-> ejercido; */
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidop' => 'required',
		'apellidom' => 'required',
		'fechaBaja' => 'required',
		'fecha' => 'required',
	/* 	'ejercido' => 'required', */
        ]);

        if ($this->selected_id) {
			$record = Finiquito::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellidop' => $this-> apellidop,
			'apellidom' => $this-> apellidom,
			'fechaBaja' => $this-> fechaBaja,
			'fecha' => $this-> fecha,
			/* 'ejercido' => $this-> ejercido */
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Finiquito Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Finiquito::where('id', $id);
            $record->delete();
        }
    }
    
    public function UpdateEjercido($id, $ejercido){
 
        $EjercidoUpdate = Finiquito::findOrFail($id)->update(['ejercido' => $ejercido]);
        return response()->json(['var'=>''.$EjercidoUpdate.'']);
    }

   
}

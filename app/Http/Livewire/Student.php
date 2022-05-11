<?php

namespace App\Http\Livewire;

use App\Models\Student as ModelsStudent;
use Livewire\Component;

class Student extends Component{
    public $isOpen=false;
    public $student_id,$fullname,$dni,$phone;

    public function render(){
        $students=ModelsStudent::all();
        return view('livewire\student',compact('students'));
    }

    public function create(){
        $this->openModal();
    }
    public function openModal(){
        $this->isOpen=true;
    }
    public function closeModal(){
        $this->isOpen=false;
    }
    private function resetInputsFields(){
        $this->fullname="";
        $this->dni="";
        $this->phone="";
    }
    public function store(){
        $this->validate([

            'fullname'=>'required',
            'dni'=>'required',
            'phone'=>'required',

        ]);
        ModelsStudent::updateOrCreate(['id'=>$this->student_id],
            [
                'fullname'=>$this->fullname,
                'dni'=> $this->dni,
                'phone'=>$this->phone,
            ]
        );
        session()->flash('message',
            $this->student_id?'Registro actualizado satisfactoriamente':'Registro creado satisfactoriamente.');
        $this->closeModal();
        $this->resetInputsFields();
    }

    public function edit(ModelsStudent $student){
        $this->student_id=$student->id;
        $this->fullname=$student->fullname;
        $this->dni=$student->dni;
        $this->phone=$student->phone;
        $this->openModal();
    }

    public function delete(ModelsStudent $student){
        $student->delete();
        session()->flash('message', 'Registro borrado satisfactoriamente.');
    }

}

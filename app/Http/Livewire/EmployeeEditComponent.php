<?php

namespace App\Http\Livewire;

use App\Models\Designation;
use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;

class EmployeeEditComponent extends Component
{
    public $name,$email,$image,$newimage,$designation_id,$empid;

    public function mount($id)
    {
        $this->empid = $id;
        $employee =Employee::where('id',$id)->first();
        $this->name=$employee->name;
        $this->email=$employee->email;
        $this->image = $employee ->image;
        $this->designation_id=$employee->designation_id;
    }

    public function update($fields)
    {
        $this->validateOnly([
            'name'  => 'required',
            //'email' => 'required|email|unique:employees,11',
            'email' => 'unique:employees,email,'.$this->empid,
            'newimage' => 'max:5000',
            'designation_id' => 'required'
        ]);
    }

    public function updateEmployee()
    {
        $this->validate([
            'name'  => 'required',
            //'email' => 'required|email|unique:employees,11',
            'email' => 'unique:employees,email,'.$this->empid,
            'newimage' => 'max:5000',
            'designation_id' => 'required'
        ]);

        $employee=Employee::find($this->empid);
        $employee->name = $this->name;
        $employee->email = $this->email;
        if($this->newimage)
        {
            $imageName =Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('employee',$imageName);
            $employee->image = $imageName;
        }
        $employee->designation_id = $this->designation_id;

        $employee->save();
        session()->flash('message','Employee record has been updated successfully');

    }


    public function render()
    {
       $desigantions=Designation::all();
        return view('livewire.employee-edit-component',['desigantions'=>$desigantions])->layout('layouts.base');
    }
}

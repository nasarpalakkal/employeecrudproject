<?php

namespace App\Http\Livewire;

use App\Mail\RegisterMail;
use App\Models\Designation;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EmployeeAddComponent extends Component
{
    use WithFileUploads;
    public $name,$email,$image,$designation_id,$randompassword;

    public function update($fields)
    {
        $this->validateOnly([
            'name'  => 'required',
            'email' => 'required|unique:employees',
            'image' => 'max:5000',
            'designation_id' => 'required'
        ]);
    }

    public function addEmployee()
    {
        $this->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:employees',
            'image' => 'max:5000',
            'designation_id' => 'required'
        ]);

        $employee=new Employee();
        $employee->name = $this->name;
        $employee->email = $this->email;
        if($this->image)
        {
            $imageName =Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('employee',$imageName);
            $employee->image = $imageName;
        }

        $employee->designation_id = $this->designation_id;

        $employee->save();
        session()->flash('message','Employee registration completed successfully!');

        $random = Str::random(8);
        $employee->randompassword=$random;
        $this->sendregisterEmployeeConfirmation($employee);
    }

    public function sendregisterEmployeeConfirmation($employee)
    {
        Mail::to($employee->email)->send(new RegisterMail($employee));
    }
    public function render()
    {
        $desigantions=Designation::all();
        return view('livewire.employee-add-component',['desigantions'=>$desigantions])->layout('layouts.base');
    }
}

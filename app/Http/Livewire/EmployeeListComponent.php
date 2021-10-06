<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeListComponent extends Component
{
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        session()->flash('message','Employee has been deleted successfully');
    }
    public function render()
    {
        $employees = Employee::all();
        return view('livewire.employee-list-component',['employees'=>$employees])->layout('layouts.base');
    }
}

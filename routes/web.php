<?php

use App\Http\Livewire\EmployeeAddComponent;
use App\Http\Livewire\EmployeeEditComponent;
use App\Http\Livewire\EmployeeListComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',EmployeeListComponent::class)->name('employeelist');
Route::get('/employeeadd',EmployeeAddComponent::class)->name('employeeadd');
Route::get('/employeeedit/{id}',EmployeeEditComponent::class)->name('employeeedit');

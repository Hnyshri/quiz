<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('employe/index', [EmployeeController::class, 'employeIndex'])->name('employe-index');
Route::get('employe/create', [EmployeeController::class, 'employeCreate'])->name('employe-create');
Route::get('employe/edit', [EmployeeController::class, 'employeEdit'])->name('employe-edit');


Route::get('quiz', [EmployeeController::class, 'getQuizSection'])->name('get-quiz');

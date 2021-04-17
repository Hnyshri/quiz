<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function employeIndex()
    {
        return view('employee.index');
    }

    public function employeCreate(Request $request)
    {
        return view('employee.create');
    }

    public function employeEdit(Request $request)
    {
        return view('employee.edit', compact('request'));
    }

    public function getQuizSection()
    {
        return view('quiz_section');
    }
}

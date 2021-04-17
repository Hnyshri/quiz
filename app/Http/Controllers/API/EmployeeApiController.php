<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeApiController extends Controller
{

    public function index()
    {
        try {
            $empList = Employee::orderBy('id', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $empList,
                'message' => 'All Employee list',
                'error' => false,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' =>  $e->getMessage(),
                'error' => true,
            ]);
        }
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => ['required', 'string', 'max:30'],
        //     'email' => ['required', 'string', 'email', 'max:255'],
        //     'age' => ['required', 'numeric', 'max:99'],
        //     'salary' => ['required'],
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 401);
        // }

        try {
            $emp = Employee::updateOrCreate([
                'id' => @$request->employee_id
            ], [
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'salary' => $request->salary,
            ]);

            return response()->json([
                'success' => true,
                'data' => $emp,
                'message' => 'Employee data saved',
                'error' => false,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' =>  $e->getMessage(),
                'error' => true,
            ]);
        }
    }

    public function edit(Request $request)
    {
        try {
            $employee = Employee::whereId($request->employee_id)->first();

            return response()->json([
                'success' => true,
                'data' => $employee,
                'message' => 'Get Employee data',
                'error' => false,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' =>  $e->getMessage(),
                'error' => true,
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $employee = Employee::whereId($request->id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Employee data deleted',
                'error' => false,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' =>  $e->getMessage(),
                'error' => true,
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Component;
use App\Car;

class EmployeesController extends Controller
{
    public function create()
    {
        return view('empcreate');
    }

    public function store(Request $request)
    {
        $emp = new Employee();
        $emp->name = $request->get('name');
        $emp->email = $request->get('emailid');

        var_dump($emp);
        $emp->save();
        return redirect('emp')->with('success', 'Employee has been successfully added');
    }

    public function index()
    {
        // $emps=Employee::all();
        $query = Employee::with('cars');
        $emps = $query->get();

        return view('empindex',compact('emps'));
    }
}

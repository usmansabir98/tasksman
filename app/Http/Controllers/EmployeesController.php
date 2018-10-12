<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
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
        $emps=Employee::all();
        $query = Employee::with('cars');
        $emps = $query->get();

        foreach($emps as $emp){
            $car_ids = $emp->car_ids;
            // $id = new \MongoDB\BSON\ObjectID($employee_ids[0]);
            // var_dump($id);
            // print_r($employee_ids); echo "<br>";
            $cars = Car::whereIn('_id', $car_ids)->get();
            //var_dump($employees); echo "<br><br>";
            // echo '<pre>';
            // print_r($employees);
            $emp->cars = $cars;
        }

        return view('empindex',compact('emps'));
    }
}

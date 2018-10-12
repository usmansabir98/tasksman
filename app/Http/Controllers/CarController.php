<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Employee;

class CarController extends Controller
{
    public function create()
    {
        $emps = Employee::all();
        return view('carcreate')->with('emps', $emps);
    }

    public function store(Request $request)
    {
        $emps = Employee::all();
        $car = new Car();
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');
        // DB::connection('mongodb')->collection('cars')->get();  
        $car->employees()->attach($emps);

        $car->save();

        // $car = Car::find($car->id);
        foreach($emps as $emp){
            $emp->cars()->attach(array($car->id));
        }
        // print_r($car);
       
       return redirect('car')->with('success', 'Car has been successfully added');
    }

    public function index()
    {
        // $cars=Car::all();
        $query = Car::with('employees');
        $cars = $query->get();
        // $cars=Car::with('employees');

        // var_dump($cars->first()->employees());
        foreach($cars as $car){
            $employee_ids = $car->employee_ids;
            // $id = new \MongoDB\BSON\ObjectID($employee_ids[0]);
            // var_dump($id);
            // print_r($employee_ids); echo "<br>";
            $employees = Employee::whereIn('_id', $employee_ids)->get();
            //var_dump($employees); echo "<br><br>";
            // echo '<pre>';
            // print_r($employees);
            $car->emps = $employees;
        }

        return view('carindex',compact('cars'));
        // var_dump($cars);
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('caredit',compact('car','id'));
    }

    public function update(Request $request, $id)
    {
        $car= Car::find($id);
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');        
        $car->save();
        return redirect('car')->with('success', 'Car has been successfully update');
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect('car')->with('success','Car has been  deleted');
    }
}

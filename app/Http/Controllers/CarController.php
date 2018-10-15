<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Employee;
use App\Component;

class CarController extends Controller
{
    public function create()
    {
        $emps = Employee::all();
        $comps = Component::all();

        return view('carcreate')->with('emps', $emps)->with('comps', $comps);
    }

    public function store(Request $request)
    {

        $empIds = $request->get('emps');
        $emps = Employee::whereIn('_id', $empIds)->get();

        // dd($emps);
        $compIds = $request->get('comps');
        $comps = Component::whereIn('_id', $compIds)->get();

        $car = new Car();
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');
        // DB::connection('mongodb')->collection('cars')->get();  
        $car->employees()->attach($emps);
        $car->components()->attach($comps);

        $car->save();

        // $car = Car::find($car->id);
        foreach($emps as $emp){
            $emp->cars()->attach(array($car->id));
        }
        foreach($comps as $comp){
            $comp->cars()->attach(array($car->id));
        }
        // print_r($car);
       
       return redirect('car')->with('success', 'Car has been successfully added');
    }

    public function index()
    {
        $query = Car::with(['employees', 'components']);
        $cars = $query->get();

        return view('carindex')->with('cars', $cars);
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

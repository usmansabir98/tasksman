<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Component;
use App\Car;
use App\Employee;

class ComponentController extends Controller
{
    public function create()
    {
        return view('compcreate');
    }

    public function store(Request $request)
    {
        $comp = new Component();
        $comp->name = $request->get('name');
        $comp->specification = $request->get('specification');

        // var_dump($comp);
        $comp->save();
        return redirect('comp')->with('success', 'Component has been successfully added');
    }

    public function index()
    {
        $query = Component::with('cars');
        $comps = $query->get();
        return view('compindex')->with('comps', $comps);
    }
}

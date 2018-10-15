<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Car extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'cars';
    
    protected $fillable = [
        'carcompany', 'model','price', 'employee_ids', 'component_ids'
    ];

    public function employees()
    {
        return $this->belongsToMany('App\Employee', null, 'car_ids', 'employee_ids');
    }

    public function components()
    {
        return $this->belongsToMany('App\Component', null, 'car_ids', 'component_ids');
    }
}

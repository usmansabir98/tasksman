<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Employee extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'employees';
    
    protected $fillable = [
        'name', 'email', 'car_ids'
    ];

    public function cars()
    {
        return $this->belongsToMany('App\Car', null, 'employee_ids', 'car_ids');
    }
}

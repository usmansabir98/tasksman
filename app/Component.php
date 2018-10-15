<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Component extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'components';
    
    protected $fillable = [
        'name', 'specification', 'car_ids'
    ];
    
    public function cars()
    {
        return $this->belongsToMany('App\Car', null, 'component_ids', 'car_ids');
    }
}
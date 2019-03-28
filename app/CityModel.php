<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = 'city';

    public function getCityByStateId($stateId){

        return CityModel::where('state_id',$stateId)->get()->toArray();

    }
}

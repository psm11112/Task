<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    protected $table = 'state';
    public  function getAll(){

        return StateModel::all()->toArray();
    }
}

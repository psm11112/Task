<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTaskModel extends Model
{
    protected $table = 'user_task';

    public function getUserTaskByUserId($userId){

        return UserTaskModel::where('user_id',$userId)->get()->toArray();
    }
    public static function get($id){

        return UserTaskModel::find($id);
    }




}

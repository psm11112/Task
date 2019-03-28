<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public  function getUserByUserName($userName){
        return  UserModel::where('user_name',$userName)->first();

    }
    public function getUser($id){

        return UserModel::find($id);
    }

    public  function getLastFiveUser(){
        return UserModel::where('user_type', '!=', \UserType::SUPER_ADMIN)->orderBy('id', 'desc')->take(5)->get();

    }
    public  function getUserCount(){

        return UserModel::all()->count();
    }
    public function checkSlugExists($slug){


        return UserModel::where('slug',$slug)->first();
    }


    public function userTask()
    {
        return $this->hasMany(UserTaskModel::class, 'user_id', 'id');
    }

}

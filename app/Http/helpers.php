<?php

use App\UserModel;
use App\UserActivityModel;
use Illuminate\Support\Facades\Session;


function getUserData(){

    $userModel=new UserModel();
$user=$userModel->getUser(Session::get('user_id'));

    return $user;

}

function getReadableDateTime($dateTime)
{
    if(!is_null($dateTime)) {
        return date('d-m-Y ', strtotime($dateTime));
    } else {
        return null;
    }
}

function addUserActivity($userId,$activity){

    $userActivityModel=new UserActivityModel();

    $userActivityModel->user_id=$userId;
    $userActivityModel->activity=$activity;
    $userActivityModel->save();


}




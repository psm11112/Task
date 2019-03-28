<?php

namespace App\Http\Controllers;

use App\UserModel;
use App\UserTaskModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function listUserTask(){


        $userModel=new UserModel();
        $userList=$userModel->with('userTask')->where('user_type','!=',\UserType::SUPER_ADMIN)->get();


        return view('admin.list')->with(['userList'=>$userList]);
    }
    public function view($id){

        $userModel=new UserModel();
        $user=$userModel->with('userTask')->find($id);


        return view('admin.user_view')->with(['userList'=>$user]);

    }
    public function userTask($id){

        $userTaskModel=new UserTaskModel();
        $userTaskList=$userTaskModel->getUserTaskByUserId($id);

        return view('admin.user_task_list')->with(['userTaskList'=>$userTaskList]);

    }
}

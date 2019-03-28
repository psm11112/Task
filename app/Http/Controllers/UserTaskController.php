<?php

namespace App\Http\Controllers;

use App\UserModel;
use App\UserTaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserTaskController extends Controller
{
    public function addUserTask(Request $request)
    {

        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $id = $request->input('id');

        $validationRules = array(
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'country' => 'required|string|max:50',


        );

        $validator = Validator::make($request->input(), $validationRules);

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
           // Session::flash('error', $errorMessage);
           // return redirect('/user-task');
            return response()->json(array('success' => false, 'message' => $errorMessage), 400);
        }

        $userTaskModel = new UserTaskModel();
        if (!is_null($id)) {
            $userTaskModel=$userTaskModel::get($id);

        }
        $userTaskModel->city = $city;
        $userTaskModel->state = $state;
        $userTaskModel->country = $country;
        $userTaskModel->user_id = Session::get('user_id');
        $userTaskModel->save();

        if(!is_null($id)){
          //  addUserActivity(Session::get('user_id'),'Update Recode');
        }else{
            //addUserActivity(Session::get('user_id'),'Add New Recode');
        }


    }


    public function index(Request $request)
    {


        $id = request()->route()->parameter('id');

        $userModel=new UserModel();
        $lastFiveUser=$userModel->getLastFiveUser();
        $count=$userModel->getUserCount();





        $getData = null;
        if (!is_null($id)) {

            $getData = UserTaskModel::get($id);

        }

        $userTask = $this->getAllUserTaskByUserId(Session::get('user_id'));
        $userTaskList = null;
        if (!empty($userTask)) {
            $userTaskList = $userTask;
        }

        return view('user_task.index')->with(['user_task' => $userTaskList, 'task' => $getData,'last_five'=>$lastFiveUser,'count'=>$count-1]);


    }

    public static function getAllUserTaskByUserId($userId)
    {

        $userTaskModel = new  UserTaskModel();
        $userTask = $userTaskModel->getUserTaskByUserId($userId);
        return $userTask;


    }
    public function deleteUserTask($id){


        $userTask=UserTaskModel::find($id);
        if(is_null($userTask)){

            Session::flash('error', "something wrong please try again!");
            return redirect('/user-task');
        }
        $userTask->delete($id);


        return redirect()->back();


    }
}

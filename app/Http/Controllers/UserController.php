<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;
use View;

class UserController extends Controller
{

    public function login(){

        return view('login');
    }

    public function signIn()
    {
        return view('sign_in');
    }

    public function profile(){

        $userModel=new UserModel();
        $user=$userModel->getUser(Session::get('user_id'));
//dd($user->first_name);
        return view('profile')->with(['user'=>$user]);
    }

    public function addUser(Request $request)
    {

       // dd($request->input());


        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $birthDate = $request->input('birth_date');
        $userName = $request->input('user_name') ;
        $password = $request->input('password');
        $image=$request->file('image');

        $filename['file_name']=null;

        $userModel = new UserModel();

        if(Session::get('user_id')){
            $userModel=new UserModel();
            $userModel=$userModel->getUser(Session::get('user_id'));
        }else{
            $ext=$userModel->checkSlugExists(Str::slug($userName));

            if(!is_null($ext)){
                return redirect('/sign-in')->with('error','username already taken');
            }

        }
        if(!is_null($image)){

            if(!is_null($userModel->profile_image)){

                if($userModel->profile_image!=="default.png"){
                    File::delete(public_path('uploads/'.$userModel->profile_image));
                }

            }



            $filename = [

                'file_name' => time() . '.' . $image->getClientOriginalExtension(),
            ];

            $destinationPath = 'uploads';
            $image->move($destinationPath,$filename['file_name']);

        }else{

            $filename['file_name']=$userModel->profile_image ?? 'default.png';
        }



        $validationRules = array(
            'first_name' => 'required|string|max:50',
            'last_name' => 'string|max:50',
            'birth_date' => 'date_format:"Y-m-d',


        );

        $validator = Validator::make($request->input(), $validationRules);

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();


            Session::flash('error', $errorMessage);
            if(Session::get('user_id')){
                return redirect('/profile');
            }else{
                return redirect('/sign-in');
            }

        }

        $userModel->first_name = $firstName;
        $userModel->last_name = $lastName;
        $userModel->date_of_birth = $birthDate;
        $userModel->user_name = $userName ?? $userModel->user_name;
        $userModel->password = Hash::make($password);
        $userModel->slug = Str::slug($userName);
        $userModel->user_type=\UserType::USER;
        $userModel->profile_image=$filename['file_name'];

        $userModel->save();


       // addUserActivity($userModel->id,'Create new Account');

        if(Session::get('user_id')){

            Session::flash('success', "Successfully updated");
            return redirect('/profile');
        }

        return redirect('/login');


    }

    public function doAuthenticationUser(Request $request)
    {

        $userModel = new UserModel();
        $userName = $request->input('user_name');
        $password = $request->input('password');
        $user = $userModel->getUserByUserName($userName);

        $validationRules = array(
            'user_name' => 'bail|required',
            'password' => 'bail|required',
        );

        $validator = Validator::make($request->input(), $validationRules);


        if($validator->fails()) {

            $errorMessage = $validator->errors()->first();

            Session::flash('error', $errorMessage);
            return redirect('/login');
        }



        if($user) {

            if(!$user->status) {



                Session::flash('error', 'user not active');
                return redirect('/login');

                // return response()->json(array('success' => false, 'message' => 'user not active'), 401);
            }
            if(Hash::check($password, $user->password)) {

                $userModel=$userModel->getUser($user->id);
                $userModel->is_online=true;
                $userModel->save();
                Session::put('user_id',$user->id);
                Session::put('user_type',$user->user_type);


               return redirect('/');
            }

            Session::flash('error', 'Invalid credentials');
            return redirect('/login');

        }else{

            Session::flash('error', 'Invalid credentials');
           return redirect('/login');
        }



    }

    public  function ActiveInActive($id){

        $userModel=new UserModel();
        $user=$userModel->getUser($id);
        if(!is_null($user)){

            if(Request()->segment(2) =="active"){

                    $user->status=true;

            }else{

                $user->status=false;
            }
            $user->save();


            return redirect('admin/user')->with('success','User status successfully change');




        }


    }
    public function passwordChange(Request $request){

        $userModel=new UserModel();
        $user=$userModel->getUser(Session::get('user_id'));
        $password=$request->input('password');
        $user->password=Hash::make($password);
        $user->save();

        Session::flash('success', 'Your password has been changed successfully');
        return redirect('/change-password');





    }

    public function logout(Request $request)
    {
        $redirectTo = '/login';


        $userModel=new UserModel();
        $userModel=$userModel->getUser(Session::get('user_id'));
        $userModel->is_online=false;
        $userModel->save();
        $request->session()->flush();
        return redirect($redirectTo);
    }

}

<?php

namespace App\Http\Controllers;

use App\CityModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCityByState(Request $request){

        $id = $request->input('id');

        $cityModel=new CityModel();
        $city=$cityModel->getCityByStateId($id);
        return response()->json(['success' => true, 'message' => '', 'data' => $city], 200);
    }






}

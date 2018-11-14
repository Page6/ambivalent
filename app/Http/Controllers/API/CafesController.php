<?php

namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use Request;

class CafesController extends Controller
{
	/*
     |-------------------------------------------------------------------------------
     | Get All Cafes
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes
     | Method:         GET
     | Description:    Gets all of the cafes in the application
    */
    public function getCafes(){
        $cafes = Cafe::all();
        return response()->json($cafes);    //以 JSON 格式返回 API 请求数据
    }

    /*
     |-------------------------------------------------------------------------------
     | Get An Individual Cafe
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes/{id}
     | Method:         GET
     | Description:    Gets an individual cafe
     | Parameters:
     |   $id   -> ID of the cafe we are retrieving
    */
    public function getCafe($id){
        $cafe = Cafe::where('id', '=', $id)->first();
        return response()->json($cafe);
    }

    /*
     |-------------------------------------------------------------------------------
     | Adds a New Cafe
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes
     | Method:         POST
     | Description:    Adds a new cafe to the application
    */
    public function postNewCafe(){
        $cafe = new Cafe();

        // 假定用户提交的数据都是可靠的，将数据验证逻辑省略掉，只留下数据保存逻辑
        $cafe->name     = Request::get('name');
        $cafe->address  = Request::get('address');
        $cafe->city     = Request::get('city');
        $cafe->state    = Request::get('state');
        $cafe->zip      = Request::get('zip');

        $cafe->save();

        return response()->json($cafe, 201);    // 遵循 RESTful 原则返回 201 状态码，表示实体已创建
    }
}
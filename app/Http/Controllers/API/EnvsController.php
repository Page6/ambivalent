<?php

namespace App\Http\Controllers\API;

use App\Models\Env;
use App\Http\Requests\ExtractEnvRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnvsController extends Controller
{
    /*
     |-------------------------------------------------------------------------------
     | Get App Name
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/app/name
     | Method:         GET
     | Description:    Gets the app name in the application
    */
    public function getAppName(){
        
        $appName = env('APP_NAME', '综合查询系统');

        return response()->json( $appName );    //以 JSON 格式返回 API 请求数据
    }

    /*
     |-------------------------------------------------------------------------------
     | Post User Info
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/user/info
     | Method:         POST
     | Description:    Posts the user info in the application
    */
    public function postUserInfo(ExtractEnvRequest $request){
        $userName = $request->input('userName');
        $password = $request->input('password');
        $permission = '3';

        if ($userName == 'admin') {
            $userInfo = ['userName'=>'$userName','password'=>'$password','permission'=>'$permission'];
            return response()->json( $userInfo, 301 );
        } else {
            $userInfo = ['userName'=>$userName,'password'=>$password,'permission'=>$permission];
            return response()->json( $userInfo, 201 );    //以 JSON 格式返回 API 请求数据
        }
    }
}

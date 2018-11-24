<?php

namespace App\Http\Controllers\API;

use App\Models\Env;
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
    	
        $appName = env('APP_NAME', 'Page6');

        return response()->json( $appName );    //以 JSON 格式返回 API 请求数据
    }
}

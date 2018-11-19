<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    // 注意我们是在 API 中访问，所以需要通过 Auth::guard('api') 指定
    public function getUser(){
	    return Auth::guard('api')->user();
	}
}

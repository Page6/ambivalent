<?php

namespace App\Http\Controllers\API;

use App\Models\Report;
use App\Http\Requests\ExtractAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /*
     |-------------------------------------------------------------------------------
     | Get Traces
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/traces
     | Method:         GET
     | Description:    Gets the traces in the application
    */
    public function getTraces(){
    	$traces = [
						[
							'operator' => '用户23',
							'operated_at' => '2017-01-01 12:34:01',
							'report' => '报表3',
							'params' => '2018-02-07,2018-08-30'
						],
						[
							'operator' => '用户27',
							'operated_at' => '2017-01-15 19:34:01',
							'report' => '报表2',
							'params' => '内容1,选项3'
						],
						[
							'operator' => '用户5',
							'operated_at' => '2017-01-01 12:34:01',
							'report' => '报表9',
							'params' => '内容2,2017-22-07,2018-08-03'
						],
						[
							'operator' => '用户6',
							'operated_at' => '2017-01-01 12:34:01',
							'report' => '报表4',
							'params' => '内容3,2018-02-07,2018-08-04,选项1'
						]
					];

        return response()->json( $traces );    //以 JSON 格式返回 API 请求数据
    }
}

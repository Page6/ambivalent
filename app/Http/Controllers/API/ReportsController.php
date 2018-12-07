<?php

namespace App\Http\Controllers\API;

use App\Models\Report;
use App\Http\Requests\ExtractReportRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /*
     |-------------------------------------------------------------------------------
     | Get Reports
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/reports
     | Method:         POST
     | Description:    Gets the reports in the application
    */
    public function postReports(ExtractReportRequest $request){
    	$permission = $request->input('permission');
    	
    	if ($permission == '3'){
    		$reports = [
							[
								'id' => '1',
								'name' => 'asdflcv,xc.eurdfl;kjasdflkjasdflkjadsflkj'
							],
							[
								'id' => '3',
								'name' => 'ascvzeurdrasdflkjadsflkj'
							],
							[
								'id' => '4',
								'name' => 'asdflcv,xc.534543;kjasdflkjasdflkjadsflkj'
							],
							[
								'id' => '7',
								'name' => 'asdflcv,xc.eurdfl;242'
							]
						];
    	}
    	else {
    		$reports = [
						[
							'id' => '1',
							'name' => 'asdflcv,xc.eurdfl;kjasdflkjasdflkjadsflkj'
						],
						[
							'id' => '2',
							'name' => 'ascvzeurdrasdflkjadsflkj'
						],
						[
							'id' => '3',
							'name' => 'asdflcv,xc.534543;kjasdflkjasdflkjadsflkj'
						]
					];
    	}

        return response()->json( $reports, 201 );    //以 JSON 格式返回 API 请求数据
    }
}
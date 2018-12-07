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

    /*
     |-------------------------------------------------------------------------------
     | Get An Individual Report
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/reports/{id}
     | Method:         GET
     | Description:    Gets an individual report
     | Parameters:
     |   $id   -> ID of the report we are retrieving
    */
    public function getReport($id){
        // $report = 'the report';
        $report = [
						[
							'index' => 1,
							'status' => 1,
							'title' => '姓名',
							'value' => ''
						],
						[
							'index' => 2,
							'status' => 2,
							'title' => '日期',
							'value' => ''
						],
						[
							'index' => 3,
							'status' => 3,
							'title' => '类型',
							'value' => ''
						]
					];
        return response()->json($report);
    }

    /*
     |-------------------------------------------------------------------------------
     | Get Results
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/results
     | Method:         POST
     | Description:    Gets the results in the application
    */
    public function postResults(ExtractReportRequest $request){
    	$searches = $request->input('search');
    	
    	foreach ($searches as $key => $search) {
    		# code...
    	}
    	if ($search == 'sb'){
    		$results = [
							[
								'id' => '1',
								'name' => '数量开发静安寺',
								'content' => 'aaa'
							],
							[
								'id' => '2',
								'name' => '数量的开静安寺',
								'content' => 'aabb'
							],
							[
								'id' => '3',
								'name' => '量的开发静安寺',
								'content' => 'aac'
							],
							[
								'id' => '4',
								'name' => '数量的开发静寺',
								'content' => 'aad'
							]
						];
    	}
    	else {
    		$results = [
						[
							'id' => '1',
							'name' => '数量静安寺',
							'content' => 'bba'
						],
						[
							'id' => '2',
							'name' => '数量开发静安寺',
							'content' => 'bbb'
						],
						[
							'id' => '3',
							'name' => '数量的开发寺',
							'content' => 'bbc'
						]
					];
    	}

        return response()->json( $results, 201 );    //以 JSON 格式返回 API 请求数据
    }

    /*
     |-------------------------------------------------------------------------------
     | Get Report Columns
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/columns/{id}
     | Method:         GET
     | Description:    Gets report columns
     | Parameters:
     |   $id   -> ID of the report we are retrieving
    */
    public function getColumns($id){
        // $report = 'the report';
        $columns = [
						[
							'title' => '项目号',
							'key' => 'id',
							'width' => 100,
							'align' => 'center'
						],
						[
							'title' => '内容',
							'key' => 'content',
							'width' => null,
							'align' => 'center'
						]
					];
        return response()->json($columns);
    }
}
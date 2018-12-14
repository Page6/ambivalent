<?php

namespace App\Http\Controllers\API;

use App\Models\Report;
use App\Http\Requests\ExtractAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

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

    /*
     |-------------------------------------------------------------------------------
     | Post File
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/file
     | Method:         POST
     | Description:    uploads the file in the application
    */
	public function postFile(ExtractAdminRequest $request){

		// 判断文件是否成功传递至后台
		if ($request->hasFile('file')) {
			$file = $request->file('file');
			if ($file && $file->isValid()) {
				// 默认路径是storage目录
	            // $destinationPath = storage_path('app/public/photos/');
	            // 文件保存至项目根路径
	            $destinationPath = storage_path('../');

	            // 如果目标目录不存在，则创建之
	            if (!file_exists($destinationPath)) {
	                mkdir($destinationPath);
	            }

	            // 文件名
	            // $filename = time() . '-' . $file->getClientOriginalName();
	            $filename = $file->getClientOriginalName();
	            // 保存文件到目录
	            $file->move($destinationPath, $filename);

	            // 获取当前路径，默认路径是public目录
	            // 切换至项目根路径
	            $cur = getcwd();
				$zip = new ZipArchive();
				if($zip->open($cur.'/../' . $filename)==TRUE){
					$zip->extractTo($cur.'/../');
					$zip->close();
				} else {
					return response()->json( null, 301 );		
				}

				// 删除原压缩文件
				unlink($destinationPath . $filename);
	        } else {
	        	return response()->json( null, 301 );
	        }
	    } else {
	    	return response()->json( null, 301 );
	    }

		return response()->json( null, 201 );
	}
}

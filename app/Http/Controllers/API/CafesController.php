<?php

namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Http\Requests\StoreCafeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $cafes = Cafe::all();
        $cafes = Cafe::with('brewMethods')->get();
        return response()->json( $cafes );    //以 JSON 格式返回 API 请求数据
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
        $cafe = Cafe::where('id', '=', $id)->with('brewMethods')->first();
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
    public function postNewCafe(StoreCafeRequest $request){
        $cafe = new Cafe();

        // 假定用户提交的数据都是可靠的，将数据验证逻辑省略掉，只留下数据保存逻辑
        $cafe->name     = $request->input('name');
        $cafe->address  = $request->input('address');
        $cafe->city     = $request->input('city');
        $cafe->state    = $request->input('state');
        $cafe->zip      = $request->input('zip');
        
        $cafe->save();

        $photo = $request->file('picture');
        if ($photo && $photo->isValid()) {
            // $destinationPath = storage_path('app/public/photos/');
            $destinationPath = storage_path('../resources/');

            // 如果目标目录不存在，则创建之
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath);
            }

            // 文件名
            $filename = time() . '-' . $photo->getClientOriginalName();
            // 保存文件到目标目录
            $photo->move($destinationPath, $filename);

            // 在数据库中创建新纪录保存刚刚上传的文件
            // $cafePhoto = new CafePhoto();

            // $cafePhoto->cafe_id = $parentCafe->id;
            // $cafePhoto->uploaded_by = Auth::user()->id;
            // $cafePhoto->file_url = $destinationPath . DIRECTORY_SEPARATOR . $filename;

            // $cafePhoto->save();
        }

        return response()->json($cafe, 201);    // 遵循 RESTful 原则返回 201 状态码，表示实体已创建
    }
}
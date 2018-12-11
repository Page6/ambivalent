<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// 公有路由，无需登录即可访问
Route::group(['prefix' => 'v1'], function(){
    
    Route::get('/user', 'API\UsersController@getUser');

    /*
     |-------------------------------------------------------------------------------
     | Get All Cafes
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes
     | Controller:     API\CafesController@getCafes
     | Method:         GET
     | Description:    Gets all of the cafes in the application
    */
    Route::get('/cafes', 'API\CafesController@getCafes');

    /*
     |-------------------------------------------------------------------------------
     | Get An Individual Cafe
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes/{id}
     | Controller:     API\CafesController@getCafe
     | Method:         GET
     | Description:    Gets an individual cafe
    */
    Route::get('/cafes/{id}', 'API\CafesController@getCafe');

    /*
     |-------------------------------------------------------------------------------
     | Adds a New Cafe
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes
     | Controller:     API\CafesController@postNewCafe
     | Method:         POST
     | Description:    Adds a new cafe to the application
    */
    Route::post('/cafes', 'API\CafesController@postNewCafe');

    /*
     |-------------------------------------------------------------------------------
     | 获取所有冲泡方法
     |-------------------------------------------------------------------------------
     | 请求URL: /api/v1/brew-methods
     | 控制器:  API\BrewMethodsController@getBrewMethods
     | 请求方法: GET
     | API描述: 获取应用中的所有冲泡方法
    */
    Route::get('/brew-methods', 'API\BrewMethodsController@getBrewMethods');

    /*
     |-------------------------------------------------------------------------------
     | Get App Name
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/app/name
     | Controller:     API\EnvsController@getAppName
     | Method:         GET
     | Description:    Gets app name in the application
    */
    Route::get('/app/name', 'API\EnvsController@getAppName');

    /*
     |-------------------------------------------------------------------------------
     | Get User Info
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/user/info
     | Controller:     API\EnvsController@postUserInfo
     | Method:         GET
     | Description:    Gets user info in the application
    */
    Route::post('/user/info', 'API\EnvsController@postUserInfo');

    /*
     |-------------------------------------------------------------------------------
     | Get All Reports
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/reports
     | Controller:     API\ReportsController@postReports
     | Method:         POST
     | Description:    Gets all of the reports in the application
    */
    Route::post('/reports', 'API\ReportsController@postReports');

    /*
     |-------------------------------------------------------------------------------
     | Get An Individual Report
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/reports/{id}
     | Controller:     API\ReportsController@getReport
     | Method:         GET
     | Description:    Gets an individual report
    */
    Route::get('/reports/{id}', 'API\ReportsController@getReport');

    /*
     |-------------------------------------------------------------------------------
     | Get All Results
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/results
     | Controller:     API\ReportsController@postResults
     | Method:         POST
     | Description:    Gets all of the results in the application
    */
    Route::post('/results', 'API\ReportsController@postResults');

    /*
     |-------------------------------------------------------------------------------
     | Get Report Columns
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/columns/{id}
     | Controller:     API\ReportsController@getColumns
     | Method:         GET
     | Description:    Gets report columns
    */
    Route::get('/columns/{id}', 'API\ReportsController@getColumns');

    /*
     |-------------------------------------------------------------------------------
     | Reset Password
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/password
     | Controller:     API\EnvsController@postPassword
     | Method:         POST
     | Description:    Resets password in the application
    */
    Route::post('/password', 'API\EnvsController@postPassword');

    /*
     |-------------------------------------------------------------------------------
     | Get All Traces
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/traces
     | Controller:     API\AdminsController@getTraces
     | Method:         GET
     | Description:    Gets all of the traces in the application
    */
    Route::get('/traces', 'API\AdminsController@getTraces');
});

// 私有路由，需要登录才能访问
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
});
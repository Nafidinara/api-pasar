<?php



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

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::resource('kecambah','KecambahController',[
        'except' => ['create','edit','update']
    ])->middleware('jwt.check');

    Route::prefix('user')->group(function(){
        Route::post('login','UserController@login');
        Route::post('register','UserController@register');
        Route::get('getUser','UserController@getAuthenticatedUser')->middleware('jwt.check');
    });
});

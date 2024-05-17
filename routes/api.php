<?php


use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PizzaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\OrderPizzaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {

    Route::get('password', [PasswordController::class,'generatePassword']);

    Route::group(['prefix'=>'pizza'], function() {
        Route::get('/', [PizzaController::class, 'index']);
        Route::post('/', [PizzaController::class,'store']);
        Route::post('/order', [OrderPizzaController::class,'create']);
    });

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1/auth'
], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', 'AuthController@me');
});
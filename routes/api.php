<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GeneralController;

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
Route::get('/', function (){
  return "api funcionando papus";
});
Route::post('auth/login', [AuthController::class, 'signin']);
Route::post('auth/register', [AuthController::class, 'signup']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas asociadas a las consultas generales que no necesitan autenticación
Route::group([
  'prefix' => 'general'
], function ($router) {

  Route::get('recentlyPosted', [GeneralController::class,'getRecentlyPosted']);

});


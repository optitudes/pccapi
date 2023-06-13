<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GeneralController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\VideoController;
use App\Http\Controllers\API\PictureController;
use App\Http\Controllers\API\PodcastController;

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
  return "api funcionando";
});
Route::post('auth/login', [AuthController::class, 'signin']);
Route::post('auth/register', [AuthController::class, 'signup']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas asociadas a las consultas generales
Route::group([
  'prefix' => 'general'
], function ($router) {

  Route::get('recentlyPosted', [GeneralController::class,'getRecentlyPosted']);

});
//rutas asociadas a las consultas relacionadas a proyectos
Route::group([
  'prefix' => 'project'
], function ($router) {

  Route::get('recentlyPosted', [ProjectController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[ProjectController::class,'searchProjects']);

});

//rutas asociadas a las consultas relacionadas a video
Route::group([
  'prefix' => 'video'
], function ($router) {

  Route::get('recentlyPosted', [VideoController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[VideoController::class,'searchVideos']);
  Route::get('/get/{id}',[VideoController::class,'getAvailableVideo']);
  

});
//rutas asociadas a las consultas relacionadas a imagenes
Route::group([
  'prefix' => 'picture'
], function ($router) {

  Route::get('recentlyPosted', [PictureController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[PictureController::class,'searchPictures']);
  Route::get('/get/{id}',[PictureController::class,'getAvailablePicture']);

});
//rutas asociadas a las consultas relacionadas a podcast
Route::group([
  'prefix' => 'podcast'
], function ($router) {

  Route::get('recentlyPosted', [PodcastController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[PodcastController::class,'searchPodcasts']);

});

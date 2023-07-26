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
Route::post('auth/login', [AuthController::class, 'signin'])->name('login');
Route::post('auth/register', [AuthController::class, 'signup']);

//ruta para probar el logeo
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth()->user();
});

//rutas que requieren autenticacion por token bearer
Route::group([
  'middleware' => 'auth:sanctum'
], function ($router) {

Route::post('auth/logout', [AuthController::class, 'logout']);
  //crud areas
});


//rutas asociadas a las consultas relacionadas a proyectos
Route::group([
  'prefix' => 'project'
], function ($router) {

  Route::get('recentlyPosted', [ProjectController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[ProjectController::class,'searchProjects']);
  Route::get('/get/{id}',[ProjectController::class,'getAvailableProject']);
  Route::get('/getNames',[ProjectController::class,'getAvailableProjectNames']);
//rutas que requieren autenticacion por token bearer
Route::group([
  'middleware' => 'auth:sanctum'
], function ($router) {

  Route::post('/create',[ProjectController::class,'create']);
  Route::post('/edit',[ProjectController::class,'edit']);
  Route::post('/remove',[ProjectController::class,'remove']);

});

});

//rutas asociadas a las consultas relacionadas a video
Route::group([
  'prefix' => 'video'
], function ($router) {

  Route::get('recentlyPosted', [VideoController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[VideoController::class,'searchVideos']);
  Route::get('/get/{id}',[VideoController::class,'getAvailableVideo']);
  Route::get('/getByProject/{id}',[VideoController::class,'getAvailableVideosByProject']);
  Route::post('/create',[VideoController::class,'create']);
/*ectController::class,'edit']);
 // Route::post('/remove',[ProjectController::class,'remove']);

});

  

*/
});
//rutas asociadas a las consultas relacionadas a imagenes
Route::group([
  'prefix' => 'picture'
], function ($router) {

  Route::get('recentlyPosted', [PictureController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[PictureController::class,'searchPictures']);
  Route::get('/get/{id}',[PictureController::class,'getAvailablePicture']);
  Route::get('/getByProject/{id}',[PictureController::class,'getAvailablePicturesByProject']);

});
//rutas asociadas a las consultas relacionadas a podcast
Route::group([
  'prefix' => 'podcast'
], function ($router) {

  Route::get('recentlyPosted', [PodcastController::class,'getRecentlyPosted']);
  Route::get('/search/{word}',[PodcastController::class,'searchPodcasts']);
  Route::get('/get/{id}',[PodcastController::class,'getAvailablePodcast']);
  Route::get('/getByProject/{id}',[PodcastController::class,'getAvailablePodcastsByProject']);

});

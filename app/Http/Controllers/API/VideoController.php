<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Video;

 

   
class VideoController extends BaseController
{ 
    public function getRecentlyPosted(Request $request)
    {

        try{
            $data = Video::getLast();
            return $this->sendResponse($data, 'Últimos videos posteados obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los videos');
        }
    }   
    //metodo que busca los videos cuyo titulo concuerde con la palabra 
    public function searchVideos(Request $request,$word)
    {
        try{
            $data = Video::searchVideos($word);
            return $this->sendResponse($data, 'Resultado de la busqueda obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }

}

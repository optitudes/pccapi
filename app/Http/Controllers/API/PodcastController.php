<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Podcast;

 

   
class PodcastController extends BaseController
{ 
    public function getRecentlyPosted(Request $request)
    {

        try{
            $data = Podcast::getLast();
            return $this->sendResponse($data, 'Últimos podcast posteados obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }   
    //metodo que busca los podcasts cuyo titulo concuerde con la palabra 
    public function searchPodcasts(Request $request,$word)
    {
        try{
            $data = Podcast::searchPodcasts($word);
            return $this->sendResponse($data, 'Resultado de la busqueda obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }
    //metodo que obtiene un podcast cuyo id concuerde con el idPodcast
    public function getAvailablePodcast(Request $request,$idPodcast)
    {
        try{
            $data = Podcast::find($idPodcast);
            if($data){
                return $this->sendResponse($data, 'Podcast obtenido con exito');
            }else{
                return $this->sendError('El podcast no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener el podcast');
        }
    }
}

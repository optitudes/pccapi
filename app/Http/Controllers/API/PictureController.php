<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Picture;

 

   
class PictureController extends BaseController
{ 
    //metodo que obtiene las imagenes mas recientes
    public function getRecentlyPosted(Request $request)

    {
        try{
            $data = Picture::getLast();
            return $this->sendResponse($data, 'Últimas imagenes posteadas obtenidas con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener las imagenes mas recientes');
        }   

    }
    //metodo que busca los proyectos cuyo titulo concuerde con la palabra 
    public function searchPictures(Request $request,$word)
    {
        try{
            $data = Picture::searchPictures($word);
            return $this->sendResponse($data, 'Resultado de la busqueda obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener las imagenes');
        }
    }


    //metodo que obtiene una   imagen cuyo id concuerde con el idImagen
    public function getAvailablePicture(Request $request,$idPicture)
    {
        try{
            $data = Picture::find($idPicture);
            if($data){
                return $this->sendResponse($data, 'Imagen obtenida con exito');
            }else{
                return $this->sendError('La imagen no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener la imagen');
        }
    }

    //metodo que obtiene una   imagen cuyo id concuerde con el idImagen
    public function getAvailablePicturesByProject(Request $request,$idProject)
    {
        try{
            $data = Picture::where('project_id', $idProject)->get();
            if($data){
                return $this->sendResponse($data, 'Imagen obtenida con exito');
            }else{
                return $this->sendError('La imagen no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener la imagen');
        }
    }

}

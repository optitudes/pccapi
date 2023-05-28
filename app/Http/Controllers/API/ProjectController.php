<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Project;

 

   
class ProjectController extends BaseController
{ 
    //metodo que obtiene los proyectos recientemente posteados
    public function getRecentlyPosted(Request $request)
    {
        try{
            $data = Project::getLast();
            return $this->sendResponse($data, 'Últimos proyectos posteados obtenidos con éxito');
        }catch(Exception $e){

            return $this->sendError('Ocurrio un error al obtener los proyectos');

        }
    }   
    //metodo que busca los proyectos cuyo titulo concuerde con la palabra 
    public function searchProjects(Request $request,$word)
    {
        try{
            $data = Project::searchProjects($word);
            return $this->sendResponse($data, 'Resultado de la busqueda obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los proyectos');
        }
    }
}

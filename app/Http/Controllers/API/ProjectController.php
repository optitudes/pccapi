<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Project;

 

   
class ProjectController extends BaseController
{ 
    public function getRecentlyPosted(Request $request)
    {

            $data = Project::getLast();
            return $this->sendResponse($data, 'Últimos proyectos posteados obtenidos con éxito');
    }   
}

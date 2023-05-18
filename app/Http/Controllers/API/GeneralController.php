<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Project;
use App\Models\Video;
use App\Models\Picture;
use App\Models\Podcast;


   
class GeneralController extends BaseController
{ 
    public function getRecentlyPosted(Request $request)
    {

             $data['projects'] = Project::getLast();
             $data['videos'] = Video::getLast();
             $data['pictures'] = Picture::getLast();
             $data['podcast'] = Podcast::getLast();

            return $this->sendResponse($data, 'Últimos elementos posteados obtenidos con éxito');
    }   
}

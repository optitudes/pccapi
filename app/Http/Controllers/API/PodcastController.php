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

            $data = Podcast::getLast();
            return $this->sendResponse($data, 'Últimos podcast posteados obtenidos con éxito');
    }   
}

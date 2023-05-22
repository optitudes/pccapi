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

            $data = Video::getLast();
            return $this->sendResponse($data, 'Últimos videos posteados obtenidos con éxito');
    }   
}

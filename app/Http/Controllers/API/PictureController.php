<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Picture;

 

   
class PictureController extends BaseController
{ 
    public function getRecentlyPosted(Request $request)
    {

            $data = Picture::getLast();
            return $this->sendResponse($data, 'Últimas imagenes posteadas obtenidas con éxito');
    }   
}

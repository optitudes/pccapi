<?php

namespace App\Http\Controllers\API;

use App\Models\InteractivePicture;
use App\Models\InteractivePictureQuestion;
use App\Models\InteractivePictureQuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Project;




class InteractivePictureQuestionAnswerController extends BaseController
{
    //metodo que crea una nueva imagen
     public function create(Request $request)
     {
         try{
             $validator = Validator::make($request->all(), [
                 'answer' => 'required|string:max:500',
                 'question_id' => 'required|numeric|exists:interactive_picture_questions,id',
             ]);
         if($validator->fails()){
             return $this->sendError('Error validation', $validator->errors());
         }


         $payload = $request->all();
         $payload['author_email'] = Auth::user()->email;

         $messageCreated  = InteractivePictureQuestionAnswer::create($payload);

         // Realizar cualquier lógica adicional con los datos y la imagen
         return $this->sendResponse($messageCreated,"Imagen creada con éxito");

         }catch(Exception $e){
             return $this->sendError('Ocurrio un error al obtener los proyectos');
         }
     }
     public function getByInteractivePictureId(Request $request, int $pictureId){
        try{
            $interactivePicture = InteractivePicture::find($pictureId);

            if( !$interactivePicture ){
               return $this->sendError('Ocurrio un error al obtener las respuestas');
            }

            $data = InteractivePictureQuestionAnswer::with('author:email,name')
                ->whereIn('question_id', $interactivePicture->questions->pluck('id'))
                ->get();

            return $this->sendResponse($data, 'Respuestas obtenidas con exito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener la imagen');
        }
     }
}

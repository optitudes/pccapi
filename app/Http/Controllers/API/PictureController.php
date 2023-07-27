<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Picture;
use App\Models\Project;

 

   
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


     //metodo que crea una nueva imagen 
     public function create(Request $request)
     {
         try{
             $validator = Validator::make($request->all(), [
                 'title' => 'required|string',
                 'description' => 'required|string',
                 'projectName' => 'required|string',
                 'banner' => 'required|file|mimes:jpeg,png,jpg,gif',
             ]);
         if($validator->fails()){
             return $this->sendError('Error validation', $validator->errors());       
         }
              
 
         $payload = $request->all();
 
         $project = Project::whereNull("deleted_at")->where('name',$payload['projectName'])->select('id')->first();
 
         if($project == null){
             return $this->sendError('Error al hallar el proyecto');       
         }
             
        // Procesar los datos recibidos
 
         $newPicture = new Picture();
         $newPicture->title = $payload['title'];
         $newPicture->description = $payload['description'];
         $newPicture->project_id = $project->id;
         $newPicture->link = '';
         $newPicture->save();
         if ($request->hasFile('banner')) {
             $banner = $request->file('banner');
 
             // Obtener la extensión original del archivo
             $extension = $banner->getClientOriginalExtension();
 
             // Nombre deseado para la imagen con la extensión
             $nombreImagen = $newPicture->id.'picture.' . $extension;
 
             // Guardar la imagen y obtener su ruta en el servidor
             $path = $banner->storeAs('projects/'.$project->id.'/banner/pictures', $nombreImagen, 'public');
             $fullBannerPath = url("/")."/storage/".$path;
             $newPicture->link = $fullBannerPath; 
             $newPicture->save(); 
             //$bannerPath = $banner->store('projects/8/banner/'.$nombreImagen.'public');
             // $bannerPath contiene la ruta de la imagen en el servidor
         }else{
             return $this->sendError('se debe enviar una imagen');       

         }
         // Realizar cualquier lógica adicional con los datos y la imagen
         return $this->sendResponse($newPicture,"Imagen creada con éxito");
 
         }catch(Exception $e){
             return $this->sendError('Ocurrio un error al obtener los proyectos');
         }
     }
 

     //metodo que crea una nueva imagen 
     public function edit(Request $request)
     {
         try{
             $validator = Validator::make($request->all(), [
                 'title' => 'required|string',
                 'description' => 'required|string',
                 'id' => 'required|numeric|min:0',
                 'banner' => 'required|file|mimes:jpeg,png,jpg,gif',
             ]);
         if($validator->fails()){
             return $this->sendError('Error validation', $validator->errors());       
         }
              
 
         $payload = $request->all();
 
        $picture = Picture::whereNull("deleted_at")->where('id',$payload['id'])->first();
 
         if($picture == null){
             return $this->sendError('Error al hallar la imagen a editar'.$payload['id']);       
         }
             
        // Procesar los datos recibidos
 
         $picture->title = $payload['title'];
         $picture->description = $payload['description'];
         $picture->save();
         if ($request->hasFile('banner')) {
             $banner = $request->file('banner');
 
             // Obtener la extensión original del archivo
             $extension = $banner->getClientOriginalExtension();
 
             // Nombre deseado para la imagen con la extensión
             $nombreImagen = $picture->id.'picture.' . $extension;
 
             // Guardar la imagen y obtener su ruta en el servidor
             $path = $banner->storeAs('projects/'.$picture->project_id.'/banner/pictures', $nombreImagen, 'public');
             $fullBannerPath = url("/")."/storage/".$path;
             $picture->link = $fullBannerPath; 
             $picture->save(); 
             //$bannerPath = $banner->store('projects/8/banner/'.$nombreImagen.'public');
             // $bannerPath contiene la ruta de la imagen en el servidor
         }         // Realizar cualquier lógica adicional con los datos y la imagen
         return $this->sendResponse($picture,"Imagen actualizada con éxito");
 
         }catch(Exception $e){
             return $this->sendError('Ocurrio un error al actualizar la imagen');
         }
     }

    //metodo que elimina un video existente 
    public function remove(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|min:0',
            ]);
            if($validator->fails()){
                return $this->sendError('Error validation', $validator->errors());       
            }
             

            $payload = $request->all();

            $picture = Picture::find($payload['id']);
            //verificar si la imagen fue encontrada
            if($picture == null){
                return $this->sendError('La imagen no ha sido encontrada.');
            }
            $picture->deleted_at = now();
            $picture->save();

            // Realizar cualquier lógica adicional 
            return $this->sendResponse(null,"Imagen borrada con éxito");

        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al encontrar la imagen a borrar');
        }

    }

}

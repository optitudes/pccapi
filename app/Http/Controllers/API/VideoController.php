<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Video;
use App\Models\Project;

 

   
class VideoController extends BaseController
{ 
    public function getRecentlyPosted(Request $request)
    {

        try{
            $data = Video::getLast();
            return $this->sendResponse($data, 'Últimos videos posteados obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los videos');
        }
    }   
    //metodo que busca los videos cuyo titulo concuerde con la palabra 
    public function searchVideos(Request $request,$word)
    {
        try{
            $data = Video::searchVideos($word);
            return $this->sendResponse($data, 'Resultado de la busqueda obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }
    //metodo que un  video cuyo id concuerde con el idVideo 
    public function getAvailableVideo(Request $request,$idVideo)
    {
        try{
            $data = Video::find($idVideo);
            if($data){
                return $this->sendResponse($data, 'Video obtenido con exito');
            }else{
                return $this->sendError('El Video no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }
    //metodo que un  video cuyo project id concuerde con el  idProject
    public function getAvailableVideosByProject(Request $request,$idProject)
    {
        try{
            $data = Video::where('project_id', $idProject)->get();
            if($data){
                return $this->sendResponse($data, 'Video obtenido con exito');
            }else{
                return $this->sendError('El Video no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }

    //metodo que crea un nuevo video 
    public function create(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
                'description' => 'required|string',
                'link' => 'required|string',
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

        $newVideo = new Video();
        $newVideo->title = $payload['title'];
        $newVideo->description = $payload['description'];
        $newVideo->link = $payload['link'];
        $newVideo->project_id = $project->id;
        $newVideo->save();
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');

            // Verificar si el archivo es una imagen válida
            if (!$this->isImageValid($banner)) {
                return response()->json(['message' => 'El archivo no es una imagen válida'], 400);
            }
            // Obtener la extensión original del archivo
            $extension = $banner->getClientOriginalExtension();

            // Nombre deseado para la imagen con la extensión
            $nombreImagen = $newVideo->id.'video.' . $extension;

            // Guardar la imagen y obtener su ruta en el servidor
            $path = $banner->storeAs('projects/'.$project->id.'/banner/videos', $nombreImagen, 'public');
            $fullBannerPath = url("/")."/storage/".$path;
            $newVideo->banner = $fullBannerPath; 
            $newVideo->save(); 
            //$bannerPath = $banner->store('projects/8/banner/'.$nombreImagen.'public');
            // $bannerPath contiene la ruta de la imagen en el servidor
        }
        // Realizar cualquier lógica adicional con los datos y la imagen
        return $this->sendResponse($newVideo,"Proyecto creado con éxito");

        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los proyectos');
        }
    }

 //metodo que edita un video 
    public function edit(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
                'description' => 'required|string',
                'link' => 'required|string',
                'id' => 'required|numeric|min:0',
                'banner' => 'required|file|mimes:jpeg,png,jpg,gif',
            ]);
        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());       
        }
             

        $payload = $request->all();

        $video = Video::whereNull("deleted_at")->where('id',$payload['id'])->first();

        if($video == null){
            return $this->sendError('Error al hallar el video a editar');       
        }
            
        // actualizar los datos del video
        $video->title = $payload['title'];
        $video->description = $payload['description'];
        $video->link = $payload['link'];
        $video->save();
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');

            // Verificar si el archivo es una imagen válida
            if (!$this->isImageValid($banner)) {
                return response()->json(['message' => 'El archivo no es una imagen válida'], 400);
            }
            // Obtener la extensión original del archivo
            $extension = $banner->getClientOriginalExtension();

            // Nombre deseado para la imagen con la extensión
            $nombreImagen = $video->id.'video.' . $extension;

            // Guardar la imagen y obtener su ruta en el servidor
            $path = $banner->storeAs('projects/'.$video->project_id.'/banner/videos', $nombreImagen, 'public');
            $fullBannerPath = url("/")."/storage/".$path;
            $video->banner = $fullBannerPath; 
            $video->save(); 
            //$bannerPath = $banner->store('projects/8/banner/'.$nombreImagen.'public');
            // $bannerPath contiene la ruta de la imagen en el servidor
        }
        // Realizar cualquier lógica adicional con los datos y la imagen
        return $this->sendResponse($video,"Video creado con éxito");

        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al actualizar el video');
        }
    }


 //metodo que valida que un file sea una imagen
 private function isImageValid($file)
 {
     $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif']; // Agregar otros tipos de imagen permitidos si es necesario
     $fileMimeType = $file->getMimeType();
 
     return in_array($fileMimeType, $allowedMimeTypes) && getimagesize($file->getPathname()) !== false;
 }
}
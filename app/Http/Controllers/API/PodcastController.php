<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Podcast;
use App\Models\Project;

 

   
class PodcastController extends BaseController
{ 
    public function getRecentlyPosted(Request $request)
    {

        try{
            $data = Podcast::getLast();
            return $this->sendResponse($data, 'Últimos podcast posteados obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }   
    //metodo que busca los podcasts cuyo titulo concuerde con la palabra 
    public function searchPodcasts(Request $request,$word)
    {
        try{
            $data = Podcast::searchPodcasts($word);
            return $this->sendResponse($data, 'Resultado de la busqueda obtenidos con éxito');
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los podcasts');
        }
    }
    //metodo que obtiene un podcast cuyo id concuerde con el idPodcast
    public function getAvailablePodcast(Request $request,$idPodcast)
    {
        try{
            $data = Podcast::find($idPodcast);
            if($data){
                return $this->sendResponse($data, 'Podcast obtenido con exito');
            }else{
                return $this->sendError('El podcast no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener el podcast');
        }
    }
    //metodo que obtiene los podcasts que pertenezcan a un proyecto 
    public function getAvailablePodcastsByProject(Request $request,$idProject)
    {
        try{
            $data = Podcast::where('project_id', $idProject)->get();
            if($data){
                return $this->sendResponse($data, 'Podcast obtenido con exito');
            }else{
                return $this->sendError('El podcast no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener el podcast');
        }
    }
    //metodo que crea un nuevo podcast 
    public function create(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
                'description' => 'required|string',
                'podcast' => 'required|file|mimes:mp3',
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

        $newPodcast = new Podcast();
        $newPodcast->title = $payload['title'];
        $newPodcast->description = $payload['description'];
        $newPodcast->link = ' ';
        $newPodcast->project_id = $project->id;
        $newPodcast->save();
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');

            // Obtener la extensión original del archivo
            $extension = $banner->getClientOriginalExtension();

            // Nombre deseado para la imagen con la extensión
            $nombreImagen = $newPodcast->id.'podcast.' . $extension;

            // Guardar la imagen y obtener su ruta en el servidor
            $path = $banner->storeAs('projects/'.$project->id.'/banner/podcast', $nombreImagen, 'public');
            $fullBannerPath = url("/")."/storage/".$path;
            $newPodcast->banner = $fullBannerPath; 
            $newPodcast->save(); 
            //$bannerPath = $banner->store('projects/8/banner/'.$nombreImagen.'public');
            // $bannerPath contiene la ruta de la imagen en el servidor
        }
        if ($request->hasFile('podcast')) {
            $podcast = $request->file('podcast');

            // Obtener la extensión original del archivo
            $extension = $podcast->getClientOriginalExtension();

            // Nombre deseado para el podcast con la extensión
            $nombrePodcast = $newPodcast->id.'podcast.' . $extension;

            // Guardar el podcast y obtener su ruta en el servidor
            $path = $podcast->storeAs('projects/'.$project->id.'/podcast', $nombrePodcast, 'public');
            $fullPodcastPath = url("/")."/storage/".$path;
            $newPodcast->link = $fullPodcastPath; 
            $newPodcast->save(); 
            //$bannerPath = $banner->store('projects/8/banner/'.$nombreImagen.'public');
            // $bannerPath contiene la ruta de la imagen en el servidor
        }

        // Realizar cualquier lógica adicional con los datos y la imagen
        return $this->sendResponse($newPodcast,"Podcast creado con éxito");

        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los proyectos');
        }      

    }
}

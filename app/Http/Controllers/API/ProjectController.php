<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Validator;
use App\Models\Project;
use App\Models\Picture;
use App\Models\Podcast;
use App\Models\Video;

 

   
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

//metodo que edita los datos de un proyecto existente 
    public function edit(Request $request)
    {
        try{
            //se obtienen los datos del request (pendiente a implementar validations de laravel)
            $name = $request->input('name');
            $description = $request->input('description');
            $idProject = $request->input('id');

            $project = Project::findOrFail($idProject);
            //verificar si el nombre ya existe
            if( $project->deleted_at != null){
                return $this->sendError('El proyecto ha sido eliminado, por tanto no se puede editar.');
            }

            //verificar si el nombre ya existe
            if( $project->name != $name && !$this->isProjectNameAvailable($name)){
                return $this->sendError('El nombre de proyecto ya está registrado.');
            }
            // Procesar los datos recibidos

            $project->name = $name;
            $project->description = $description;
            $project->save();
            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');

                // Verificar si el archivo es una imagen válida
                if (!$this->isImageValid($banner)) {
                    return response()->json(['message' => 'El archivo no es una imagen válida'], 400);
                }
                // Obtener la extensión original del archivo
                $extension = $banner->getClientOriginalExtension();

                // Nombre deseado para la imagen con la extensión
                $nombreImagen = 'bannerImage.' . $extension;

                // Guardar la imagen y obtener su ruta en el servidor
                $path = $banner->storeAs('projects/'.$project->id.'/banner', $nombreImagen, 'public');
                $fullBannerPath = url("/")."/storage/".$path;
                $project->banner = $fullBannerPath; 
                $project->save(); 
            }
            // Realizar cualquier lógica adicional con los datos y la imagen
            return $this->sendResponse($project,"Proyecto actualizado con éxito");

        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al encontrar el proyecto a editar');
        }
    }

//metodo que elimina un proyecto existente 
    public function remove(Request $request)
    {
        try{
            //se obtienen los datos del request (pendiente a implementar validations de laravel)
            $idProject = $request->input('id');

            $project = Project::find($idProject);
            //verificar si el nombre ya existe
            if($project == null){
                return $this->sendError('El proyecto no ha sido encontrado.');
            }

            //se elimina todo el contenido relacionado al proyecto
            Picture::deleteByProjectId($idProject);
            Video::deleteByProjectId($idProject);
            Podcast::deleteByProjectId($idProject);
            $project->deleted_at = now();
            $project->save();

            // Realizar cualquier lógica adicional con los datos y la imagen
            return $this->sendResponse(null,"Proyecto borrado con éxito");

        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al encontrar el proyecto a borrar');
        }

    }



    //metodo que crea un nuevo proyecto 
    public function create(Request $request)
    {
        try{
            $name = $request->input('name');
            $description = $request->input('description');


            //verificar si el nombre ya existe
            if(!$this->isProjectNameAvailable($name)){
                return $this->sendError('El nombre de proyecto ya está registrado.');
            }
            // Procesar los datos recibidos

            $newProject = new Project();
            $newProject->name = $name;
            $newProject->description = $description;
            $newProject->save();
            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');

                // Verificar si el archivo es una imagen válida
                if (!$this->isImageValid($banner)) {
                    return response()->json(['message' => 'El archivo no es una imagen válida'], 400);
                }
                // Obtener la extensión original del archivo
                $extension = $banner->getClientOriginalExtension();

                // Nombre deseado para la imagen con la extensión
                $nombreImagen = 'bannerImage.' . $extension;

                // Guardar la imagen y obtener su ruta en el servidor
                $path = $banner->storeAs('projects/'.$newProject->id.'/banner', $nombreImagen, 'public');
                $fullBannerPath = url("/")."/storage/".$path;
                $newProject->banner = $fullBannerPath; 
                $newProject->save(); 
                //$bannerPath = $banner->store('projects/8/banner/'.$nombreImagen.'public');
                // $bannerPath contiene la ruta de la imagen en el servidor
            }
            // Realizar cualquier lógica adicional con los datos y la imagen
            return $this->sendResponse($newProject,"Proyecto creado con éxito");

        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener los proyectos');
        }
    }
    //metodo qu valida si un nombre de proyecto ya esta registrado
    private function isProjectNameAvailable($name = ""){
        $projectsFinded = Project::where('name',$name)->get()->count();
        return $projectsFinded == 0? true : false ;
    }
    //metodo que valida que un file sea una imagen
    private function isImageValid($file)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif']; // Agregar otros tipos de imagen permitidos si es necesario
        $fileMimeType = $file->getMimeType();
    
        return in_array($fileMimeType, $allowedMimeTypes) && getimagesize($file->getPathname()) !== false;
    }

    //metodo que obtiene un proyecto cuyo id concuerde con el idProject
    public function getAvailableProject(Request $request,$idProject)
    {
        try{
            $data = Project::where('id',$idProject)->whereNull("deleted_at")->first();
            if($data){
                return $this->sendResponse($data, 'Proyecto obtenido con exito');
            }else{
                return $this->sendError('El proyecto no existe');
            }
        }catch(Exception $e){
            return $this->sendError('Ocurrio un error al obtener el proyecto');
        }
    }
}

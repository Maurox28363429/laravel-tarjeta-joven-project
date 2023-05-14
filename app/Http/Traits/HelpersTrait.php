<?php

namespace App\Http\Traits;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Postmark\PostmarkClient;
trait HelpersTrait {
    protected function subirArchivo($file, $title = 'file',$prefix='user-files'){
        /* Como se implementa
            //https://www.laraveltip.com/como-mostrar-imagenes-de-la-carpeta-storage-en-laravel/
            if($request->hasFile("img")){
                $data["img_url"]=$this->storageImg($data["img"],$data["dni"]);  
            }
        */
        $extension = $file->getClientOriginalExtension();
        $name_file = "{$title}.{$ext}";
        try {
            if(file_exists(public_path("storage/".$name_file))){
                unlink(public_path("/storage/".$name_file));
            }
            \Storage::disk($prefix)->put($name_file, \File::get($file));
            return \Storage::url($name_file);
        } catch (\Exception $e) {
            return "Error";
        }
    }//end subir archivo
    protected function sendMail($email,$plantilla,$data)
    {
        $client = new PostmarkClient("0406f231-9899-47d3-a951-f20006e66c25");
        // Send an email:
        return $sendResult = $client->sendEmailWithTemplate(
          "informacion@tarjetajovendiamante.com",
          $email,
          $plantilla,
          $data);
    }
    protected function HelpError($error){
        $data=[
            "file"=>$error->getFile(),
            "message"=>$error->getMessage(),
            "error"=>$error->getMessage(),
            "line"=>$error->getLine()
        ];
        \Log::error($data);
        return $data;
    }//end
    protected function HelpPaginate($query,$page=15){
        $datos=$query->paginate($page);
        return [
            "data"=>$datos->items(),
            "pagination"=>[
                "totalItems"=>$datos->total(),
                "currentPage"=>$datos->currentPage(),
                "itemsPerPage"=>$datos->perPage(),
                "lastPage"=>$datos->lastPage()
            ]
        ];
    }//end

   protected function HelpIndex($query,$data){
        try {
            DB::beginTransaction();
                $pages=$data["pages"] ?? null;
                $select=$data["select"] ?? null;
                $includes=$data["includes"] ?? [];
                if($select!=null){$query->select($select);}
                if($includes!=null){$query->with($includes);}
                if($pages==null){$data=$query->get();}else{$data=$query->paginate($pages);}
            DB::commit();
            return [
                "message"=>($pages!=null)? "Paginado de datos":"Listado de datos",
                "status"=>200,
                "data"=>$data
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//index
    protected function HelpDelete($query){
        try {
            DB::beginTransaction();
                $process=$query->first();
                if(!$process){
                    throw new \Exception("No encontrado", 404);
                }
                $process->delete();
            DB::commit();
            return [
                "message"=>"Datos borrados",
                "status"=>200
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//DeleteEnd
    protected function HelpStore($query,$data){
        try {
            DB::beginTransaction();
                $process=$query->create($data);
            DB::commit();
            return [
                "message"=>"Datos creados",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//StoreEnd
    protected function HelpUpdate($query,$data){
        try {
            DB::beginTransaction();
               $process=$query->first();
                if(!$process){
                    throw new \Exception("No encontrado", 404);
                }
                $process->update($data);
            DB::commit();
            return [
                "message"=>"Datos actualizados",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//StoreEnd
     protected function HelpShow($query,$data){
        try {
            DB::beginTransaction();
                $includes=$data["includes"] ?? [];
                $process=$query->with($includes)->first();
                if(!$process){
                    throw new \Exception("No encontrado", 404);
                }
                return $process;
            DB::commit();
            return [
                "message"=>"Busqueda",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//StoreEnd
}//end

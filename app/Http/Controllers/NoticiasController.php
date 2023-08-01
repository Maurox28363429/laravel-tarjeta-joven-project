<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use App\Models\{
    noticias as Model,
    User,
    notify
};
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class NoticiasController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        try {
            $response=[];
            DB::beginTransaction();
                $query=Model::query()->orderBy('prioridad','asc');
                $search=$request->input("search") ?? null;
                if($search){
                    $query
                    ->where("titulo","like","%".$search."%")
                    ->orWhere("descripcion","like","%".$search."%")
                    ->orwhere("categoria","like","%".$search."%");

                }
            DB::commit();
            return $this->HelpPaginate(
                $query
            );
        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }
    }
    public function show($id,Request $request)
    {
        try {
            return Model::find($id);
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function store(Request $request){
        try {
            
            $response=[];
            DB::beginTransaction();
                $data=$request->all();
                if($request->has('img')){
                    $date = Carbon::now();
                    $text = $date->format('Y_m_d');
                    $image = $request->file('img');
                    $path = $image->store('public/images/notocias/'.$text."/");
                    $data['img_url']=env('APP_URL').Storage::url($path);
                }
                $process=Model::create($data);
            DB::commit();
            $this->mensaje_realtime(
                'Se añadio una nueva promoción',
                'promocion',
                $process->id
            );
            $usuarios= User::query()->select(['id'])->where('role_id', 3)->get();
            foreach ($usuarios as $key => $value) {
                notify::create([
                    "titulo"=>"Se creo una nueva promoción",
                    "body"=>'',
                    "user_id"=>$value->id,
                    "data"=>$process,
                    "type"=>'promocion',
                    "id_post"=>$process->id,
                ]);
            }
            return [
                "message"=>"Datos creados",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }
    }
    public function update($id,Request $request){
        try {
            $response=[];
            DB::beginTransaction();
                $modelo=Model::find($id);
                if(!$modelo){
                    throw new \Exception("No encontrado", 404);
                }
                $data=$request->all();
                if($request->has('img')){
                    $date = Carbon::now();
                    $text = $date->format('Y_m_d');
                    $image = $request->file('img');
                    $path = $image->store('public/images/notocias/'.$text."/");
                    $data['img_url']=env('APP_URL').Storage::url($path);
                }
                $modelo->update($data);
                $response=$modelo;
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }
    }
    public function delete($id,Request $request){
        try {
            $response=[];
            DB::beginTransaction();
                $modelo=Model::find($id);
                if(!$modelo){
                    throw new \Exception("No encontrado", 404);
                }
                Model::query()->where("id",$id)->delete();
                $response=$modelo;
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }
    }
}

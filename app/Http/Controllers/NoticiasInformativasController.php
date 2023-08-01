<?php

namespace App\Http\Controllers;

use App\Http\Traits\HelpersTrait;
use Illuminate\Http\Request;
use App\Models\{
    noticias_informativas as Model,
    User,
    notify
};
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class NoticiasInformativasController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Model::query();
        $search=$request->input('search') ?? null;
        if($search){
            $query->where('titulo','like','%'.$search.'%')->orWhere('descripcion','like','%'.$search.'%');
        }
        return $this->HelpPaginate(
            $query,
            15
        );
    }//index
    public function store(Request $request){
        $query=Model::query();
        $data=$request->all();
        if($request->has('img')){
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('img');
            $path = $image->store('public/images/noticiasinformativas/'.$text."/");
            $data['img_url']=env('APP_URL').Storage::url($path);
        }
        try {
            DB::beginTransaction();
                $process=$query->create($data);
            DB::commit();
            $this->mensaje_realtime(
                'Una nueva noticia fue agregada',
                'noticias',
                $process->id
            );
            $usuarios= User::query()->select(['id'])->where('role_id', 3)->get();
            foreach ($usuarios as $key => $value) {
                notify::create([
                    "titulo"=>"Se creo una nueva noticia",
                    "body"=>'',
                    "user_id"=>$value->id,
                    "data"=>$process,
                    "type"=>'noticias',
                    "id_post"=>$process->id,
                ]);
            }
            return [
                "message"=>"Datos creados",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//store
    public function show($id,Request $request){
        $query=Model::query()->where('id',$id);
        return $this->HelpShow(
            $query,
            $request->all()
        );
    }//store
    public function update($id,Request $request){
        $query=Model::query()->where('id',$id);
        $data=$request->all();
        if($request->has('img')){
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('img');
            $path = $image->store('public/images/noticiasinformativas/'.$text."/");
            $data['img_url']=env('APP_URL').Storage::url($path);
        }
        return $this->HelpUpdate(
            $query,
            $data
        );
    }//store
    public function delete($id ,Request $request){
        $query=Model::query()->where('id',$id);
        return $this->HelpDelete(
            $query
        );
    }//delete
}

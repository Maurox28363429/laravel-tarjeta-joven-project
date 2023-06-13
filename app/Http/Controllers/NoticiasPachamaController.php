<?php

namespace App\Http\Controllers;

use App\Http\Traits\HelpersTrait;
use Illuminate\Http\Request;
use App\Models\{
    noticias_pachama as Model
};
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class NoticiasPachamaController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Model::query();
        return $this->HelpPaginate(
            $query
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
                'Se añadio una nueva noticia, en Pachama',
                'pachama',
                $process->id
            );
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

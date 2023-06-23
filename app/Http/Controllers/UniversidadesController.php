<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Universidades as Models
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class UniversidadesController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $with=$request->input('with') ?? [];
        $query->with($with);
        $nombre=$request->input('nombre') ?? null;
        if($nombre){
            $query->where('nombre','like',"%".$nombre."%");
        }
        $active=$request->input('active') ?? null;
        if($active){
            $query->where('active',$active);
        }
        $universidad_id=$request->input('universidad_id') ?? null;
        if($universidad_id){
            $query->where('universidad_id',$universidad_id);
        }
        $dir=$request->input('dir') ??  null;
        if($dir && $dir!='todos'){
            $query->orderBy("prioridad","asc");
            $query->whereJsonContains('link_map', ['ubication' => $dir]);
        }
        return $this->HelpPaginate(
                $query,
                10
            );
    }
    public function show($id,Request $request){
        $includes=$request->input('with') ?? [];
        return $this->HelpShow(
            Models::where("id",$id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request){
        
        $data=$request->all(); 
        $query=Models::query();
        try {
            DB::beginTransaction();
            if($request->hasFile('img')){
                $date = Carbon::now();
                $text = $date->format('Y_m_d');
                $image = $request->file('img');
                $path = $image->store('public/images/universidades/'.$text."/");
                $data['img_array_url']=[env('APP_URL').Storage::url($path)];
            }
                $process=$query->create($data);
            DB::commit();
            $this->mensaje_realtime(
                'Una nueva universidad fue agregada',
                'universidad',
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
    }
    public function update($id,Request $request){
        $data=$request->all();
        if($request->hasFile('img')){
                $date = Carbon::now();
                $text = $date->format('Y_m_d');
                $image = $request->file('img');
                $path = $image->store('public/images/universidades/'.$text."/");
                $data['img_array_url']=[env('APP_URL').Storage::url($path)];
            }
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $data
        );
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}

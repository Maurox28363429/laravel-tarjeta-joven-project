<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    ofertas_comercio as Models
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class OfertasComercioController extends Controller
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
        $comercio_id=$request->input('comercio_id') ?? null;
        if($comercio_id){
            $query->where('comercio_id',$comercio_id);
        }
        //total
        $init_total=$request->input('init_total') ?? null;
        if($init_total){
            $query->where("total",">=",$init_total);
        }//end
        $end_total=$request->input('end_total') ?? null;
        if($end_total){
            $query->where("total","<=",$end_total);
        }//end
        $descuento=$request->input('descuento') ?? null;
        if($descuento){
            $query->query('descuento',$descuento);
        }//end
        $dir=$request->input('dir') ??  null;
        if($dir && $dir!='todos'){
            $query->orderBy("prioridad","asc");
            //$query->whereJsonContains('link_map', ['ubication' => $dir]);
            $query->where('link_map','like','%'.$dir.'%');
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
                $path = $image->store('public/images/ofertas/'.$text."/");
                $data['img_array_url']=[env('APP_URL').Storage::url($path)];
            }
                $process=$query->create($data);
            DB::commit();
            $this->mensaje_realtime(
                'Se añadio una nueva oferta',
                'ofertas',
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
        $query=Models::query();
         try {
            DB::beginTransaction();
                if($request->hasFile('img')){
                    $date = Carbon::now();
                    $text = $date->format('Y_m_d');
                    $image = $request->file('img');
                    $path = $image->store('public/images/ofertas/'.$text."/");
                    $data['img_array_url']=[env('APP_URL').Storage::url($path)];
                }
               $process=$query->where('id',$id)->first();
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
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}

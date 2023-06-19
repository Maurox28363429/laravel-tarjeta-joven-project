<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\concurso as Model;
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ConcursoController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        try {
            $response=[];
            DB::beginTransaction();
                $query=Model::query()->with(['user']);
                $init_date = $request->input('init_date') ?? null;
                if($init_date){
                    $query->whereDate('created_at', '>=', $init_date);
                }
                $end_date = $request->input('end_date') ?? null;
                if($end_date){
                    $query->whereDate('created_at', '<=', $end_date);
                }
                $last_ganador = $request->input('last_ganador') ?? null;
                if($last_ganador){
                    $last_ganador=Model::query()->whereNotNull('ganador_id')->orderBy('created_at','desc')->first();
                }
                $year= $request->input('year') ?? null;
                if($year){
                    $year=Carbon::createFromDate($year, 1, 1)->format('Y');
                    $query->whereYear('created_at', '=', $year);
                }
            DB::commit();
            $datos = $query->paginate(15);
            $response= [
                "data" => $datos->items(),
                "pagination" => [
                    "totalItems" => $datos->total(),
                    "currentPage" => $datos->currentPage(),
                    "itemsPerPage" => $datos->perPage(),
                    "lastPage" => $datos->lastPage()
                ]
            ];
            if($last_ganador){
                $response['last_ganador']=$last_ganador;
            }
            return $response;
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
                if($request->hasFile('img')){
                    $date = Carbon::now();
                    $text = $date->format('Y_m_d');
                    $image = $request->file('img');
                    $path = $image->store('public/images/concurso/'.$text."/");
                    $data['img']=env('APP_URL').Storage::url($path);
                }
                $response=Model::create($data);
            DB::commit();
            return $response;
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
                if($request->hasFile('img')){
                    $date = Carbon::now();
                    $text = $date->format('Y_m_d');
                    $image = $request->file('img');
                    $path = $image->store('public/images/concurso/'.$text."/");
                    $data['img']=env('APP_URL').Storage::url($path);
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

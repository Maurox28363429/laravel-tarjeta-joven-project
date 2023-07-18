<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\HelpersTrait;
use App\Models\sos as Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class SosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        try {
            $response=[];
            DB::beginTransaction();
                $query=Model::query();
                $search=$request->input("search") ?? null;
                if($search){
                    $query
                    ->where("name","like","%".$search."%")
                    ->orWhere("phone","like","%".$search."%")
                    ->orWhere("descripcion","like","%".$search."%");
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
                if($request->hasFile('img')){
                    $date = Carbon::now();
                    $text = $date->format('Y_m_d');
                    $image = $request->file('img');
                    $path = $image->store('public/images/sos/'.$text."/");
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
                    $path = $image->store('public/images/sos/'.$text."/");
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

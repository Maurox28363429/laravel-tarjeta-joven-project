<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formulario as Model;
use App\Http\Traits\HelpersTrait;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class FormularioController extends Controller
{
    use HelpersTrait;
    use HelpersTrait;
    public function index(Request $request){
        try {
            $response=[];
            DB::beginTransaction();
                $query=Model::query();
                $search=$request->input("search") ?? null;
                if($search){
                    //$query
                    //->where("titulo","like","%".$search."%")
                    //->orWhere("descripcion","like","%".$search."%")
                    //->orwhere("categoria","like","%".$search."%");
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
                DB::statement("
        	    	ALTER TABLE formularios DROP id;
        	    ");
        	    DB::statement("
        	    	ALTER TABLE formularios AUTO_INCREMENT = 1;
        	    ");
        	    DB::statement("
        	    	ALTER TABLE formularios ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;
        	    ");
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

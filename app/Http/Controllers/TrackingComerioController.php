<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tracking_comerio as Model;
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
class TrackingComerioController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        try {
            $response=[];
            DB::beginTransaction();
                $query=Model::query();
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
            $data=Model::find($id);
             if(!$data){
                throw new \Exception("No encontrado", 404);
            }
            return $data;
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

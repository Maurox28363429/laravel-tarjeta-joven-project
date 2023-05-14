<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    comercio_oferta_cliente as Models,
    User,
    ofertas_comercio
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
class ComercioOfertaClienteController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $with=$request->input('with') ?? [];
        $comercio_id=$request->input('comercio_id') ?? null;
        if($comercio_id){
            $query->where('comercio_id',$comercio_id);
        }
        $client_id=$request->input('client_id') ?? null;
        if($client_id){
            $query->where('client_id',$client_id);
        }
        //date
        $init_date=$request->input('init_date') ?? null;
        if($init_date){
            $query->WhereDate('created_at','>=', date($init_date) );
        }//end
        $end_date=$request->input('end_date') ?? null;
        if($end_date){
            $query->WhereDate('created_at','<=', date($end_date) );
        }//end
        $query->with($with);
        return $this->HelpPaginate(
                $query
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
        try {
            DB::beginTransaction();
            $code=$request->input('code') ?? null;
            $data=$request->all();
            if($code){
                $user=User::where('code',$code)->first();
                if(!$user){
                    return response()->json([
                        'error'=>"codigo invalido",
                        "status"=>404
                    ], 404);
                }
                $data['client_id']=$user->id;
            }
            foreach ($data['ofertas'] as $key => $value) {
                $buscar=ofertas_comercio::find($value["id"]);
                if(!$buscar){
                    throw new \Exception("La oferta con ID #".$value["id"]." no fue encontrado", 404);
                }
                $cantidad_actual=$buscar->stock;
                $cantidad_actual=$cantidad_actual-$value["cantidad"];
                if($cantidad_actual<0){
                    throw new \Exception("No hay suficiente stock de la oferta ".$buscar->name." para el pedido", 500);
                }
                $buscar->update(["stock"=>$cantidad_actual]);
            }
            DB::commit();
            return $this->HelpStore(
                Models::query(),
                $data
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function update($id,Request $request){
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}

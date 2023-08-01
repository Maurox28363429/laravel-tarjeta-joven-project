<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    ProductosEcommerces as Models,
    User,
    notify
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductosEcommercesController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('with') ?? [];
        $query->with($with);
        $search = $request->input('search') ?? '';
        if($search != ''){
            $query->where('nombre', 'like', '%' . $search . '%');
        }
        $categori_id = $request->input('category_id') ?? null;
        if($categori_id){
            $query->where('category_id',$categori_id);
        }
        return $this->HelpPaginate(
            $query
        );
    }
    public function show($id, Request $request)
    {
        $includes = $request->input('with') ?? [];
        return $this->HelpShow(
            Models::where("id", $id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if ($request->hasFile('img')) {
                $date = Carbon::now();
                $text = $date->format('Y_m_d');
                $image = $request->file('img');
                $path = $image->store('public/images/productos/' . $text . "/");
                $data['img'] = env('APP_URL') . Storage::url($path);
            }
            $query=Models::query();
            $process=$query->create($data);
            $this->mensaje_realtime(
                'Se creo un nuevo producto',
                'producto',
                $process->id
            );
            $usuarios= User::query()->select(['id'])->where('role_id', 3)->get();
            foreach ($usuarios as $key => $value) {
                notify::create([
                    "titulo"=>"Se creo un nuevo Producto",
                    "body"=>'',
                    "user_id"=>$value->id,
                    "data"=>$process,
                    "type"=>'producto',
                    "id_post"=>$process->id,
                ]);
            }
            DB::commit();
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
    public function update($id, Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('img');
            $path = $image->store('public/images/productos/' . $text . "/");
            $data['img'] = env('APP_URL') . Storage::url($path);
        }
        return $this->HelpUpdate(
            Models::where("id", $id)->limit(1),
            $request->all()
        );
    }
    public function delete($id, Request $request)
    {
        return $this->HelpDelete(
            Models::where("id", $id)->limit(1),
            $request->all()
        );
    }
}

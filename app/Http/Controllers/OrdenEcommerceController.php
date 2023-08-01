<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    ordenEcommerce as Models,
    User,
    ProductosEcommerces
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class OrdenEcommerceController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('with') ?? [];
        $query->with($with);
        $search = $request->input('search') ?? null;
        if($search){
            $query->whereHas('cliente', function ($query) use ($search) {
                $query->whereRaw("CONCAT(name,' ',last_name) LIKE ?", "%{$search}%");
            });
        }
        $initDate = $request->input('initDate') ?? null;
        $endDate = $request->input('endDate') ?? null;
        if($initDate){
            $query->whereDate('created_at', '>=', $initDate);
        }
        if($endDate){
            $query->whereDate('created_at', '<=', $endDate);
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
        $data = $request->all();
        if ($request->hasFile('img')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('img');
            $path = $image->store('public/images/productos/' . $text . "/");
            $data['img'] = env('APP_URL') . Storage::url($path);
        }

        $productos = $data['json_productos'];
        foreach ($productos as $key => $value) {

            $producto = ProductosEcommerces::where('id', $value['id'])->first();
            $producto->stock = $producto->stock - $value['cantidad'];
            $producto->save();
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
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

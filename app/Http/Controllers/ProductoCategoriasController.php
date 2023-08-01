<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productoCategorias as Models;
use App\Http\Traits\HelpersTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductoCategoriasController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('with') ?? [];
        $query->with($with);
        $search = $request->input('search') ?? '';
        if($search != ''){
            $query->where('name', 'like', '%' . $search . '%');
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
        if ($request->hasFile('icon')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('icon');
            $path = $image->store('public/images/categorias/' . $text . "/");
            $data['icon'] = env('APP_URL') . Storage::url($path);
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('icon')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('icon');
            $path = $image->store('public/images/categorias/' . $text . "/");
            $data['icon'] = env('APP_URL') . Storage::url($path);
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

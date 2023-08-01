<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notify as Models;
use App\Http\Traits\HelpersTrait;

class NotifyController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('with') ?? [];
        $query->with($with)->orderBy('id','desc');
        $user_id=$request->input('user_id') ?? null;
        if($user_id){
            $query->where('user_id',$user_id);
        }
        $datos=$query->paginate(15);
        return [
            "data"=>$datos->items(),
            "pagination"=>[
                "totalItems"=>$datos->total(),
                "currentPage"=>$datos->currentPage(),
                "itemsPerPage"=>$datos->perPage(),
                "lastPage"=>$datos->lastPage()
            ],
            "notificaciones"=>$query->count()
        ];
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
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
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

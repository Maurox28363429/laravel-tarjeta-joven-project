<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    price_membresia as Models
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class PriceMembresiaController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $with=$request->input('with') ?? [];
        $query->with($with);
        $inversed=$request->input('inversed') ?? null;
        if($inversed){
            $query->orderBy('id','desc');
        }
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
        return $this->HelpStore(
            Models::query(),
            $request->all()
        );
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

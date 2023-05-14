<?php

namespace App\Http\Controllers;

use App\Http\Traits\HelpersTrait;
use Illuminate\Http\Request;
use App\Models\{
    provincias as Model
};
class ProvinciasController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Model::query();
        return $this->HelpPaginate(
            $query
        );
    }//index
    public function store(Request $request){
        $query=Model::query();
        return $this->HelpStore(
            $query,
            $request->all()
        );
    }//store
    public function show($id,Request $request){
        $query=Model::query()->where('id',$id);
        return $this->HelpShow(
            $query,
            $request->all()
        );
    }//store
    public function update($id,Request $request){
        $query=Model::query()->where('id',$id);
        return $this->HelpUpdate(
            $query,
            $request->all()
        );
    }//store
    public function delete($id ,Request $request){
        $query=Model::query()->where('id',$id);
        return $this->HelpDelete(
            $query
        );
    }//delete
}

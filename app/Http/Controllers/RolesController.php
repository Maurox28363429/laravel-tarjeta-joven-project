<?php

namespace App\Http\Controllers;

use App\Models\roles as Model;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Traits\HelpersTrait;
class RolesController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Model::query();
        $page=$request->input('page') ?? null;
        if(isset($page)){
            return $this->HelpPaginate(
                $query
            );
        }else{
            return $query->select(['id','name'])->get();
        }

    }//index
}

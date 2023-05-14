<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    versionapp as Models
};
use App\Http\Traits\HelpersTrait;
class VersionappController extends Controller
{
    use HelpersTrait;
    public function get(){
        return Models::query()->first();
    }
    public function update(Request $request){
        $query=Models::query()
        ->update(
            $request->all()    
        );
        return Models::query()->first();
    }
}

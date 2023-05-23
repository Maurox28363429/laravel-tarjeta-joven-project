<?php

namespace App\Http\Controllers;

use App\Http\Traits\HelpersTrait;
use Illuminate\Http\Request;
use App\Models\{
    provincias as Model
};
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class ProvinciasController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        if (!function_exists('paginate')) {
            function paginate(Collection $items, $perPage = 15, $page = null, $options = [])
            {
                $page = $page ?: (LengthAwarePaginator::resolveCurrentPage() ?: 1);
                $items = $items instanceof Collection ? $items : Collection::make($items);
                $paginator = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
                return $paginator->withPath('');
            }
        }
        $query=Model::query();

        $sortUni=$request->input('sort_uni') ?? null;
        if($sortUni){
            $collection = collect($query->get());
            return $collection->sortByDesc('universidades')->values();
        }
        $sortOfertas=$request->input('sort_ofertas') ?? null;
        if($sortOfertas){
            $collection = collect($query->get());
            return $collection->sortByDesc('ofertas')->values();
        }
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

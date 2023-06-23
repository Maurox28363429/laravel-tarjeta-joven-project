<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\{
    User,
    tracking_comerio
};
use App\Http\Traits\HelpersTrait;
use Carbon\Carbon;

class DashboardController extends Controller
{
    use HelpersTrait;
    public function comercio(Request $request)
    {
        try {
            $user_id = $request->input('user_id') ?? null;
            $user = User::where('id', $user_id)->first();
            if (!$user) {
                throw new \Exception("Usuario no encontrado", 404);
            }
            //filters
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;
            $current_date = $currentYear . '/' . $currentMonth . '/01';
            //querys
            $tracking_month = tracking_comerio::query()->where('comercio_id', $user->id)->whereDate('created_at', '>=', $current_date)->count();
            $tracking_by_month = tracking_comerio::query()->where('comercio_id', $user->id)->whereYear('created_at', $currentYear)->get()->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            })->map(function ($item) {
                return $item->count();
            })->toArray();

           $tracking_by_month=\Collect($tracking_by_month)->map(function ($item, $key) {
                return [
                    "mes" => $key,
                    "visitas" => $item
                ];
            })->toArray()->values();
            $sexo_visitas = tracking_comerio::query()->where('comercio_id', $user->id)->with(['user' => function ($query) {
                $query->select('id', 'sex');
            }])->get()->pluck('user.sex')->countBy()->toArray();

            $provincia_visitas = tracking_comerio::query()->where('comercio_id', $user->id)->with(['user' => function ($query) {
                $query->select('id', 'provincia');
            }])->get()->pluck('user.provincia')->map(function ($item) {
                return json_decode($item);
            })->toArray();

            $provincia_visitas_parse = [];
            foreach ($provincia_visitas as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $key2 => $value2) {
                        $provincia_visitas_parse[] = $value2;
                    }
                } else {
                    $provincia_visitas_parse[] = $value;
                }
            }
            $provincia_visitas = array_count_values($provincia_visitas_parse);


            $edades_visitas = tracking_comerio::query()->where('comercio_id', $user->id)->with(['user' => function ($query) {
                $query->select('id', 'fecha_nacimiento');
            }])->get()->pluck('user.fecha_nacimiento')->map(function ($item) {
                return Carbon::parse($item)->age;
            })->countBy()->toArray();


            return [
                "visitas_mes" => $tracking_month,
                "visitas_por_mes" => $tracking_by_month,
                "sexo_visitas" => $sexo_visitas,
                "provincia_visitas" => $provincia_visitas,
                "edades_visitas" =>  $edades_visitas
            ];
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function admin(Request $request)
    {
        return 10;
    }
}

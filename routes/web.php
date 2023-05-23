<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\{
    payment_menbresia as Models,
    User,
    membresia
};
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('yappy',function(){
    return view('yappy');
});
Route::get('/pagosbg.php', function(Request $request){
function validateHash()
{
    try {
        include 'env.php'; // IMPORTAR ARCHIVO DE ENV PARA UTILIZAR LA VARIABLE 'CLAVE_SECRETA'
        $orderId = $_GET['orderId'];
        $status = $_GET['status'];
        $hash = $_GET['hash'];
        $domain = $_GET['domain'];
        $values = base64_decode($CLAVE_SECRETA);
        $secrete = explode('.', $values);
        $signature =  hash_hmac('sha256', $orderId . $status . $domain, $secrete[0]);
        $success = strcmp($hash, $signature) === 0;
    } catch (\Throwable $th) {
        $success = false;
    }
    return $success;
}


if (isset($_GET['orderId']) && isset($_GET['status']) && isset($_GET['domain']) && isset($_GET['hash'])) {
    header('Content-Type: application/json');
    $success = validateHash();
    if ($success) {
        // Si es true, se debe cambiar el estado de la orden en la base de datos
         $user=User::query()->where('id',$_GET['orderId'])->first();
            if(!$user){
                throw new \Exception('usuario no encontrado',404);
            }
        $membresia=membresia::query()->where('user_id',$user->id)->first();
        if(!$membresia){
            throw new \Exception('El usuario no tiene membresia',404);
        }

        $data=[
            "verificado"=>1,
            "payment"=>9.99,
            "user_id"=>$user->id,
            "referencia"=>"yappy",
            "membresia_id"=>$membresia,
            "img_url"=>''
        ];
        $model=Models::create($data);
        $nowTimeDate = new Carbon($membresia->fecha_cobro);
        $newTime = $nowTimeDate->addYear();
        $membresia->update([
            'fecha_cobro'=>$newTime,
            'type'=>"Comprada",
            'membresia_id'=>6
        ]);

    }
    return json_encode(['succes' => $success]);
}
//end
});//end Route
Route::get('/', function () {
    //return view('yappy');
    return view('welcome');
});

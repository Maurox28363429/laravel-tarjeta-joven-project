<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//borraro
//Route::get('example', 'App\Http\Controllers\UserController@example');
//auth

Route::post("woocommerce",function(Request $request){
    $filename = 'archivo.txt';
    $data="\n".json_encode(
        $request->all()
    );
    if (!file_exists($filename)) {
        // si el archivo no existe, crearlo con el contenido "Iniciando archivo"
        file_put_contents($filename,$data);
    } else {
        // si el archivo existe, agregar "nuevo contenido" al final del archivo
        $contenido_actual = file_get_contents($filename);
        file_put_contents($filename, $contenido_actual . $data);
    }

});
Route::get("woocommerce",function(Request $request){
    $filename = 'archivo.txt';
    $data="\n".json_encode(
        $request->all()
    );
    if (!file_exists($filename)) {
        // si el archivo no existe, crearlo con el contenido "Iniciando archivo"
        file_put_contents($filename,$data);
    } else {
        // si el archivo existe, agregar "nuevo contenido" al final del archivo
        $contenido_actual = file_get_contents($filename);
        file_put_contents($filename, $contenido_actual . $data);
    }

});

Route::post('importUserMembresia', 'App\Http\Controllers\UserController@importUserMembresia');

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::get('export_membresia', 'App\Http\Controllers\UserController@export_membresia');
Route::get('export_pdf_membresia', 'App\Http\Controllers\UserController@export_pdf_membresia');

Route::get('auth', 'App\Http\Controllers\UserController@getAuthenticatedUser');
Route::post('getRecovery', 'App\Http\Controllers\UserController@getRecovery');
Route::post('putRecovery', 'App\Http\Controllers\UserController@putRecovery');
//user
Route::post('validateRecovery', 'App\Http\Controllers\UserController@validateRecovery');
Route::get('user/{id}', 'App\Http\Controllers\UserController@show');
Route::get('users', 'App\Http\Controllers\UserController@index');
Route::put('user/{id}', 'App\Http\Controllers\UserController@update');
Route::post('user/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('user/{id}', 'App\Http\Controllers\UserController@delete');



Route::get('/export_form2_excel', 'App\Http\Controllers\FormularioController@export_form2_excel');
Route::get('/export_users_excel', 'App\Http\Controllers\UserController@export_users_excel');

Route::get('/export_vendedor_users_excel', 'App\Http\Controllers\UserController@export_vendedor_users_excel');
//clientes

//Roles
Route::get('roles', 'App\Http\Controllers\RolesController@index');
//formulario
Route::post('/formulario','App\Http\Controllers\clientesController@store');
Route::get('/export_clientes', 'App\Http\Controllers\clientesController@exportar');
Route::get('/report', 'App\Http\Controllers\clientesController@report');
Route::get('/export_clientes_excel', 'App\Http\Controllers\clientesController@exportar_excel');
Route::delete('/client/{id}', 'App\Http\Controllers\clientesController@delete');
Route::put('/client/{id}', 'App\Http\Controllers\clientesController@update');
Route::get('/clientes','App\Http\Controllers\clientesController@index');
Route::get('/cliente/{id}','App\Http\Controllers\clientesController@show');
Route::get('/graficas','App\Http\Controllers\clientesController@graficas');

//PriceMembresia
Route::get('price-membresia',"App\Http\Controllers\PriceMembresiaController@index");
Route::get('price-membresia/{id}',"App\Http\Controllers\PriceMembresiaController@show");
Route::put('price-membresia/{id}',"App\Http\Controllers\PriceMembresiaController@update");
Route::post('price-membresia',"App\Http\Controllers\PriceMembresiaController@store");
Route::delete('price-membresia/{id}',"App\Http\Controllers\PriceMembresiaController@delete");

//SOS
Route::get('sos',"App\Http\Controllers\SosController@index");
Route::get('sos/{id}',"App\Http\Controllers\SosController@show");
Route::put('sos/{id}',"App\Http\Controllers\SosController@update");
Route::post('sos',"App\Http\Controllers\SosController@store");
Route::delete('sos/{id}',"App\Http\Controllers\SosController@delete");

//Concurso
Route::get('concurso/years',"App\Http\Controllers\ConcursoController@getYears");
Route::get('concurso',"App\Http\Controllers\ConcursoController@index");
Route::get('concurso/{id}',"App\Http\Controllers\ConcursoController@show");
Route::put('concurso/{id}',"App\Http\Controllers\ConcursoController@update");
Route::post('concurso',"App\Http\Controllers\ConcursoController@store");
Route::delete('concurso/{id}',"App\Http\Controllers\ConcursoController@delete");

//PaymentMembresia
Route::get('payment-membresia',"App\Http\Controllers\PaymentMenbresiaController@index");
Route::get('payment-membresia/{id}',"App\Http\Controllers\PaymentMenbresiaController@show");
Route::get('/export_payment_excel', 'App\Http\Controllers\PaymentMenbresiaController@exportar_excel');
Route::put('payment-membresia/{id}',"App\Http\Controllers\PaymentMenbresiaController@update");
Route::post('payment-membresia',"App\Http\Controllers\PaymentMenbresiaController@store");


Route::get('payment-membresia/forzar/{id}',"App\Http\Controllers\PaymentMenbresiaController@forzar");

Route::get('payment-membresia/forzar_email/{id}',"App\Http\Controllers\PaymentMenbresiaController@wordpress_email_forzar");

Route::post('prueba-membresia',"App\Http\Controllers\PaymentMenbresiaController@regalia");

Route::post("payment-membresia/changes/{id}","App\Http\Controllers\PaymentMenbresiaController@changes");
Route::get("verificar_pago/{id}","App\Http\Controllers\PaymentMenbresiaController@verificar");

Route::delete('payment-membresia/{id}',"App\Http\Controllers\PaymentMenbresiaController@delete");

//ofertas
Route::get('comercio-ofertas',"App\Http\Controllers\OfertasComercioController@index");
Route::get('comercio-ofertas/{id}',"App\Http\Controllers\OfertasComercioController@show");
Route::put('comercio-ofertas/{id}',"App\Http\Controllers\OfertasComercioController@update");
Route::post('comercio-ofertas/{id}',"App\Http\Controllers\OfertasComercioController@update");
Route::post('comercio-ofertas',"App\Http\Controllers\OfertasComercioController@store");
Route::delete('comercio-ofertas/{id}',"App\Http\Controllers\OfertasComercioController@delete");
//universidades
Route::get('universidades',"App\Http\Controllers\UniversidadesController@index");
Route::get('universidades/{id}',"App\Http\Controllers\UniversidadesController@show");
Route::put('universidades/{id}',"App\Http\Controllers\UniversidadesController@update");
Route::post('universidades',"App\Http\Controllers\UniversidadesController@store");
Route::delete('universidades/{id}',"App\Http\Controllers\UniversidadesController@delete");
//noticias
Route::get('noticias',"App\Http\Controllers\NoticiasController@index");
Route::get('noticias/{id}',"App\Http\Controllers\NoticiasController@show");
Route::put('noticias/{id}',"App\Http\Controllers\NoticiasController@update");
Route::post('noticias/{id}',"App\Http\Controllers\NoticiasController@update");
Route::post('noticias',"App\Http\Controllers\NoticiasController@store");
Route::delete('noticias/{id}',"App\Http\Controllers\NoticiasController@delete");
//ofertas percibidas por los clientes
Route::get('cliente-comercio-ofertas',"App\Http\Controllers\ComercioOfertaClienteController@index");
Route::get('cliente-comercio-ofertas/{id}',"App\Http\Controllers\ComercioOfertaClienteController@show");
Route::put('cliente-comercio-ofertas/{id}',"App\Http\Controllers\ComercioOfertaClienteController@update");
Route::post('cliente-comercio-ofertas',"App\Http\Controllers\ComercioOfertaClienteController@store");
Route::delete('cliente-comercio-ofertas/{id}',"App\Http\Controllers\ComercioOfertaClienteController@delete");
//pronvincias
Route::get('provincias',"App\Http\Controllers\ProvinciasController@index");
Route::get('provincias/{id}',"App\Http\Controllers\ProvinciasController@show");
Route::put('provincias/{id}',"App\Http\Controllers\ProvinciasController@update");
Route::post('provincias',"App\Http\Controllers\ProvinciasController@store");
Route::delete('provincias/{id}',"App\Http\Controllers\ProvinciasController@delete");

//noticias_informativas
Route::get('noticias_informativas',"App\Http\Controllers\NoticiasInformativasController@index");
Route::get('noticias_informativas/{id}',"App\Http\Controllers\NoticiasInformativasController@show");
Route::post('noticias_informativas/{id}',"App\Http\Controllers\NoticiasInformativasController@update");
Route::post('noticias_informativas',"App\Http\Controllers\NoticiasInformativasController@store");
Route::delete('noticias_informativas/{id}',"App\Http\Controllers\NoticiasInformativasController@delete");

//version_app
Route::get('versionapp',"App\Http\Controllers\VersionappController@get");

Route::post('versionapp',"App\Http\Controllers\VersionappController@update");


//Noticias Pachama
Route::get('noticias_pachama',"App\Http\Controllers\NoticiasPachamaController@index");
Route::get('noticias_pachama/{id}',"App\Http\Controllers\NoticiasPachamaController@show");
Route::post('noticias_pachama/{id}',"App\Http\Controllers\NoticiasPachamaController@update");
Route::post('noticias_pachama',"App\Http\Controllers\NoticiasPachamaController@store");
Route::delete('noticias_pachama/{id}',"App\Http\Controllers\NoticiasPachamaController@delete");

//Formulario2
Route::get('formulario2',"App\Http\Controllers\FormularioController@index");
Route::get('formulario2/{id}',"App\Http\Controllers\FormularioController@show");
Route::put('formulario2/{id}',"App\Http\Controllers\FormularioController@update");
Route::post('formulario2',"App\Http\Controllers\FormularioController@store");
Route::delete('formulario2/{id}',"App\Http\Controllers\FormularioController@delete");

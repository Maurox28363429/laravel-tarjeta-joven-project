<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;

use Maatwebsite\Excel\Facades\Excel;
    use App\Exports\{
    	ClientFormExport
    };
use App\Models\ClientForm;
class clientesController extends Controller
{	
	use HelpersTrait;
	public function report(Request $request)
	{
		$query=ClientForm::query();
		$init_date=$request->input('init_date') ?? null;
		if($init_date){
			$query->whereDate('created_at','>=',$init_date);
		}
		$end_date=$request->input('end_date') ?? null;
		if($end_date){
			$query->whereDate('created_at','<=',$end_date);
		}
		$model=$query->get();
		$vendedores=[
			  "Vendedor #1"=>0,
              "Vendedor #2"=>0,
              "Vendedor #3"=>0,
              "Vendedor #4"=>0,
              "Vendedor #5"=>0,
              "Vendedor #6"=>0,
              "Vendedor #7"=>0,
              "Vendedor #8"=>0,
              "Vendedor #9"=>0,
              "Vendedor #10"=>0,
              "Vendedor #11"=>0,
              "Vendedor #12"=>0,
              "Vendedor #13"=>0,
              "Vendedor #14"=>0,
              "Vendedor #15"=>0,
              "Vendedor #16"=>0,
              "Vendedor #17"=>0,
              "Vendedor #18"=>0,
              "Vendedor #19"=>0,
              "Vendedor #20"=>0
          ];
	    foreach ($model as $key => $value) {
	    	$client=json_decode($value->data);
	    	switch ($client->dni_vendedor) {
	    		case 'Vendedor #1':
	    			$vendedores['Vendedor #1']++;
	    			// code...
	    			break;
	    		case 'Vendedor #2':
	    			$vendedores['Vendedor #2']++;
	    			// code...
	    			break;
	    		case 'Vendedor #3':
	    			$vendedores['Vendedor #3']++;
	    			// code...
	    			break;
	    		case 'Vendedor #4':
	    			$vendedores['Vendedor #4']++;
	    			// code...
	    			break;
	    		case 'Vendedor #5':
	    			$vendedores['Vendedor #5']++;
	    			// code...
	    			break;
	    		case 'Vendedor #6':
	    			$vendedores['Vendedor #6']++;
	    			// code...
	    			break;
	    		case 'Vendedor #7':
	    			$vendedores['Vendedor #7']++;
	    			// code...
	    			break;
	    		case 'Vendedor #8':
	    			$vendedores['Vendedor #8']++;
	    			// code...
	    			break;
	    		case 'Vendedor #9':
	    			$vendedores['Vendedor #9']++;
	    			// code...
	    			break;
	    		case 'Vendedor #10':
	    			$vendedores['Vendedor #10']++;
	    			// code...
	    			break;
	    		case 'Vendedor #11':
	    			$vendedores['Vendedor #11']++;
	    			// code...
	    			break;
	    		case 'Vendedor #12':
	    			$vendedores['Vendedor #12']++;
	    			// code...
	    			break;
	    		case 'Vendedor #13':
	    			$vendedores['Vendedor #13']++;
	    			// code...
	    			break;
	    		case 'Vendedor #14':
	    			$vendedores['Vendedor #14']++;
	    			// code...
	    			break;
	    		case 'Vendedor #15':
	    			$vendedores['Vendedor #15']++;
	    			// code...
	    			break;
	    		case 'Vendedor #16':
	    			$vendedores['Vendedor #16']++;
	    			// code...
	    			break;
	    		case 'Vendedor #17':
	    			$vendedores['Vendedor #17']++;
	    			// code...
	    			break;
	    		case 'Vendedor #18':
	    			$vendedores['Vendedor #18']++;
	    			// code...
	    			break;
	    		case 'Vendedor #19':
	    			$vendedores['Vendedor #19']++;
	    			// code...
	    			break;
	    		case 'Vendedor #20':
	    			$vendedores['Vendedor #20']++;
	    			// code...
	    			break;
	    		default:
	    			// code...
	    			break;
	    	}
	    }
	    	return [
	    		'vendedores'=>$vendedores
	    	];
	}
	public function exportar_excel(Request $request){
		$date = \Carbon\Carbon::now();
		$dayWithHyphen = $date->format('d_m_Y');
		$paremetro=$request->all();
		return Excel::download(new ClientFormExport($paremetro), 'formulario_report'.$dayWithHyphen.'.xlsx');
	}
    public function graficas(Request $request){
    	$clientes=DB::table('clientes')->orderBy('id','desc')->get();
	    $data=[
	        "clientes"=>0,
	        "membresia"=>0,
	        "concurso"=>0,
	        "recomendar"=>0,
	        "descuentos"=>[
	            "turismo"=>0,
	            "estudios"=>0,
	            "diversion"=>0,
	            "gastronomia"=>0,
	            "salud"=>0
	        ],
	        "edades"=>[
	            '18 o menos'=>0,
	            '18 a 15'=>0,
	            '26 a 35'=>0,
	            '36 o mas'=>0
	        ],
	        "rating-2"=>[
	            "puntaje_1"=>0,
	            "puntaje_2"=>0,
	            "puntaje_3"=>0,
	            "puntaje_4"=>0,
	            "puntaje_5"=>0,
	        ]
	    ];
	    foreach ($clientes as $key => $value) {
	        $cliente=json_decode(
	            str_replace('rating-2', 'rating', $value->data),true
	        );
	
	        //estadistica
	        $data['clientes']++;
	
	
	        if($cliente["menbresia"]=='true'){
	            $data['membresia']++;
	        }
	
	        if($cliente["concurso"]=='true'){
	            $data['concurso']++;
	        }
	        if($cliente["recomendar"]=='true'){
	            $data['recomendar']++;
	        }
	
	        if(isset($cliente["descuentos"])){
	            if(in_array('turismo', $cliente["descuentos"])==1){
	                $data['descuentos']['turismo']++;
	            }
	            if(in_array('salud', $cliente["descuentos"])==1){
	                $data['descuentos']['salud']++;
	            }
	            if(in_array('estudios', $cliente["descuentos"])==1){
	                $data['descuentos']['estudios']++;
	            }
	            if(in_array('diversion', $cliente["descuentos"])==1){
	                $data['descuentos']['diversion']++;
	            }
	            
	            if(in_array('gastronom&iacute;a', $cliente["descuentos"])==1 || in_array('gastronomia', $cliente["descuentos"])==1 || in_array('gastronomía', $cliente["descuentos"])==1){
	                $data['descuentos']['gastronomia']++;
	            }
	        }
	        if(isset($cliente["edad"])){
	            if($cliente["edad"]=="18 o menos"){
	                $data['edades']['18 o menos']++;
	            }
	            if($cliente["edad"]=="18 a 15"){
	                $data['edades']['18 a 15']++;
	            }
	            if($cliente["edad"]=="26 a 35"){
	                $data['edades']['26 a 35']++;
	            }
	            if($cliente["edad"]=="36 o mas"){
	                $data['edades']['36 o mas']++;
	            }
	        }
	        if(isset($cliente["rating"])){
	            switch ($cliente["rating"]) {
	                case '1':
	                    $data['rating-2']['puntaje_1']++;
	                    break;
	                case '2':
	                    $data['rating-2']['puntaje_2']++;
	                    break;
	                case '3':
	                    $data['rating-2']['puntaje_3']++;
	                    break;
	                case '4':
	                    $data['rating-2']['puntaje_4']++;
	                    break;
	                case '5':
	                    $data['rating-2']['puntaje_5']++;
	                    break;
	                default:
	                    // code...
	                    break;
	            }
	        }
	    }//endForeach
	    return \Response::json($data,200);
    }//graficas
    public function index(Request $request){
    	$page=$request->input('page') ?? null;
	    $search=$request->input("search") ?? null;
	    if(isset($page) ){
			if ($search) {
				if(is_numeric($search)){
					$query=DB::table('clientes')->where("id",$search)->paginate(15);
				}else{
					$query=DB::table('clientes')->where("data","like","%".$search."%")->paginate(15);
				}
			}else{
				$query=DB::table('clientes')->paginate(15);
			}
			$clientes=$query->items();
	    }else{
	        $queryt=DB::table('clientes');
			$clientes=$query->get();
	    }
	    $datos=[];
	    foreach ($clientes as $key => $value) {
	       try {
	           $codify=str_replace('gastronom&iacute;a','gastronomia',$value->data);
	       $codify=str_replace('rating-2', 'rating', $codify);
	       $cliente=json_decode($codify);
	
	       $dato=[];
	       foreach ($cliente as $key2 => $value2) {
	            try {
	                if($key2=='descuentos'){
	                    $dato[$key2]=$value2;
	                    continue;
	                }
	                foreach ($value2 as $key3 => $value3) {
	
	                    $dato[$key3]=$value3;
	                }
	            } catch (\Exception $error) {
	
	                $dato[$key2]=$value2;
	            }
	       }
	       $dato['id']=$value->id;
	       $dato['emitido']=$value->created_at ?? '';
	       $dato["emitido"]=date_create($dato["emitido"]);
	       $dato["emitido"]=date_format($dato["emitido"],"d/m/Y ");
	       $datos[]=$dato;
	       } catch (\Exception $error) {
	            return $data=[
	                "file"=>$error->getFile(),
	                "message"=>$error->getMessage(),
	                "error"=>$error->getMessage(),
	                "line"=>$error->getLine()
	            ];
	       }
	    }//endForeach
	    if( isset($page) ){
	        return [
	            "data"=>$datos,
	            "pagination"=>[
	                "totalItems"=>$query->total(),
	                "currentPage"=>$query->currentPage(),
	                "itemsPerPage"=>$query->perPage(),
	                "lastPage"=>$query->lastPage()
	            ]
	        ];
	    }else{
	     $data['data']=$datos;
	     return \Response::json($data,200);
	    }
    }//end index
    public function show($id,Request $request){
    	    $page=$request->input('page') ?? null;
	    if( isset($page) ){
	        $query=DB::table('clientes')->paginate(15);
	        $clientes=$query->items();
	    }else{
	        $clientes=DB::table('clientes')->where('id',$id)->get();
	    }
	
	    $datos=[];
	    foreach ($clientes as $key => $value) {
	       try {
	           $codify=str_replace('gastronom&iacute;a','gastronomia',$value->data);
	       $codify=str_replace('rating-2', 'rating', $codify);
	       $cliente=json_decode($codify);
	
	       $dato=[];
	       foreach ($cliente as $key2 => $value2) {
	            try {
	                if($key2=='descuentos'){
	                    $dato[$key2]=$value2;
	                    continue;
	                }
	                foreach ($value2 as $key3 => $value3) {
	
	                    $dato[$key3]=$value3;
	                }
	            } catch (\Exception $error) {
	
	                $dato[$key2]=$value2;
	            }
	       }
	       $dato['id']=$value->id;
	       $dato['emitido']=$value->created_at ?? '';
	       $dato["emitido"]=date_create($dato["emitido"]);
	       $dato["emitido"]=date_format($dato["emitido"],"d/m/Y ");
	       $datos[]=$dato;
	       } catch (\Exception $error) {
	            return $data=[
	                "file"=>$error->getFile(),
	                "message"=>$error->getMessage(),
	                "error"=>$error->getMessage(),
	                "line"=>$error->getLine()
	            ];
	       }
	    }//endForeach
	    if( isset($page) ){
	        return [
	            "data"=>$datos,
	            "pagination"=>[
	                "totalItems"=>$query->total(),
	                "currentPage"=>$query->currentPage(),
	                "itemsPerPage"=>$query->perPage(),
	                "lastPage"=>$query->lastPage()
	            ]
	        ];
	    }else{
	     $data['data']=$datos;
	     return \Response::json($data,200);
	    }
    }//end index

    public function store(Request $request){
    	
	    $data=$request->all();
	    $Correo=$request->input('Correo') ?? null;
	    $Cedula=$request->input('Cedula') ?? null;
	    if($Correo){
	        $prueba=DB::table('clientes')->whereJsonContains('data->Correo', $Correo)->first();
	        if($prueba){
	            return[
	                "message"=>"El correo ya existe, gracias por haber llenado el formulario",
	                "status"=>500
	            ];
	        }
	    }
	    if($Cedula){
	        $prueba=DB::table('clientes')->whereJsonContains('data->Cedula', $Cedula)->first();
	        if($prueba){
	            return[
	                "message"=>"La cedula ya existe, gracias por haber llenado el formulario",
	                "status"=>500
	            ];
	        }
	    }
	    if(empty($data['comentario'])){
	        $data['comentario']='No definido';
	    }
	    if(empty($data['descuentos'])){
	        $data['descuentos']=[];
	    }
		//enviar correo si es valido 0406f231-9899-47d3-a951-f20006e66c25
		try {
			$enviado=$this->sendMail($Correo,31306527,[
				"user_name"=>$request->input("Nombre")." ".$request->input("Apellido")
			]);
			if($enviado->message!="OK"){
                throw new \Exception("Error", 404);
                
            }
		} catch (\Exception $e) {
			return $e;
			return response()->json([
			   "message"=>"Por favor, colocar un correo real"
			],404);
		}

	    $query=DB::table('clientes')
	        ->insertGetId([
	            "data"=>json_encode($data)
	        ]);
	    return [
	        "status"=>($query)? 200:500,
	        'id'=>$query
	    ];
    }//end store
    public function update($id,Request $request){
	    $data=$request->except(["id"]);
	    if(empty($data['descuentos'])){
	        $data['descuentos']=[];
	    }
	    $query=DB::table('clientes')->where('id',$id)->update([
	    		"data"=>json_encode($data)
	    ]);
	    return [
	        "status"=>($query)? 200:500
	    ];
    }//end update
    public function delete($id,Request $request){
    	    if(empty($id)){
    	    	 return ['status'=>500,'messages'=>"Debe enviar un Id para borrar"];
    	    }


		    $query=DB::table('clientes')->where('id', $id)->delete();
		    DB::statement("
    	    	ALTER TABLE clientes DROP id;
    	    ");
    	    DB::statement("
    	    	ALTER TABLE clientes AUTO_INCREMENT = 1;
    	    ");
    	    DB::statement("
    	    	ALTER TABLE clientes ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;
    	    ");
		    return [
		        "status"=>($query)? 200:500
		    ];
    }//end delete
    public function exportar(Request $request){
    	    $clientes=DB::table('clientes')->orderBy('id','asc')->get();
	    $datos=[];
	    foreach ($clientes as $key => $value) {
	       try {
	           $codify=str_replace('gastronom&iacute;a','gastronomia',$value->data);
	           $codify=str_replace('menbresia','membresia',$codify);
	           $codify=str_replace('rating-2', 'rating', $codify);
	           $cliente=json_decode($codify);
	
	       $dato=[];
	       foreach ($cliente as $key2 => $value2) {
	            try {
	                if($key2=='descuentos'){
	                    $valor='';
	                    foreach ($value2 as $key3 => $value3) {
	                        $valor.=$value3.' | ';
	                    }
	                    $dato[$key2]=$valor;
	                    continue;
	                }
	                foreach ($value2 as $key3 => $value3) {
	                    if($value3==''){
	                        $dato[$key3]='No definido';
	                    }else{
	                       $dato[$key3]=str_replace(',', ';', $value3);
	                    }
	                }
	            } catch (\Exception $error) {
	                if($value2==''){
	                    $dato[$key2]='No definido';
	                }else{
	                   $dato[$key2]=str_replace(',', ';', $value2);
	                }
	
	            }
	       }
	       $dato['id']=$value->id;
	       $dato['emitido']=$value->created_at ?? '';
	       $dato["emitido"]=date_create($dato["emitido"]);
	       $dato["emitido"]=date_format($dato["emitido"],"d/m/Y ");
	       $datos[]=$dato;
	       } catch (\Exception $error) {
	            return $data=[
	                "file"=>$error->getFile(),
	                "message"=>$error->getMessage(),
	                "error"=>$error->getMessage(),
	                "line"=>$error->getLine()
	            ];
	       }
	    }//endForeach
	        $data="";
	        foreach ($datos[0] as $key => $value) {
	            $data.=ucfirst($key)." ,";
	        }
	        $data.="\n";
	        foreach ($datos as $key => $value) {
	
	            foreach ($value as $key2 => $value2) {
	                $valor='';
	                if(is_array($value2)){
	                    foreach ($value2 as $clave => $value3) {
	                         $valor.=$value3.' | ';
	                    }
	                }else{
	                    $valor=$value2;
	                }
	                $data.=$valor." ,";
	            }
	            $data.="\n";
	        }
	        return \response($data, 200)
	              ->header('Content-Type', 'text/csv')
	              ->header('Content-Disposition',' attachment');
    }//end exportar
}

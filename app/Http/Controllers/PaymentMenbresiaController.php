<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    payment_menbresia as Models,
    User,
    membresia
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use YappyCheckout;
    use App\Exports\{
        PaymentMembresiaExport
    };
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
class PaymentMenbresiaController extends Controller
{
    use HelpersTrait;
    public function exportar_excel(Request $request){
        $date = \Carbon\Carbon::now();
        $dayWithHyphen = $date->format('d_m_Y');
        $paremetro=$request->all();
        return Excel::download(new PaymentMembresiaExport($paremetro), 'Payment_report'.$dayWithHyphen.'.xlsx');
    }//end
    public function yappyPaymentStatus(Request $request)
    {
        $data = YappyCheckout::getPaymentStatus($request->all());
        $success = isset($data);
        if ($success) {
            // Mi lógica de negocio a continuación
            // $order = \App\Models\Order::find($data['order_id']);
            // $order->status = $data['status'];
            // $order->save();
        }
        return response()->json([
            'success' => $success,
        ]);
    }
    public function redirectToYappyPayment()
    {
        $url = YappyCheckout::getPaymentUrl(
            "1",//$orderId, 
            0,//$subtotal, 
            0,//$tax, 
            100//$total
        );
        abort_if(is_null($url), 500);
        return redirect()->away($url);
    }
    public function index(Request $request){
        $query=Models::query();
        $with=$request->input('with') ?? ["user"];
        $query->with($with);
        $search=$request->input("search") ?? null;
        if($search){
            $query->whereHas('user',function($q)use($search){
                $q->whereRaw("CONCAT(name,' ',last_name) LIKE '%{$search}%'");
            });
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
        try {
            DB::beginTransaction();
                $data=$request->all();
                $user=User::query()->where('id',$data['user_id'])->first();
                if(!$user){
                    throw new \Exception('usuario no encontrado',404);
                }
                $membresia=membresia::query()->where('user_id',$user->id)->first();
                if(!$membresia){
                    throw new \Exception('El usuario no tiene membresia',404);
                }
                if($membresia->status=="activa" && $membresia->type=='Comprada'){
                    throw new \Exception('El usuario ya tiene una membresia vigente',404);
                }
                if($request->has('img')){
                    $date = Carbon::now();
                    $text = $date->format('Y_m_d');
                    $image = $request->file('img');
                    $path = $image->store('public/images/payments/'.$text."/");
                    $data['img_url']=env('APP_URL').Storage::url($path);
                }
                $data['verificado']=0;
                $yappy=$request->input('yappy') ?? null;
                if($yappy){
                    $data['verificado']=1;
                }
                $model=Models::create($data);
                if($data['verificado']==1){
                    $nowTimeDate = new Carbon($membresia->fecha_cobro);
                    $newTime = $nowTimeDate->addYear();
                    $membresia->update([
                        'fecha_cobro'=>$newTime,
                        'type'=>"Comprada",
                        'membresia_id'=>6
                    ]);
                }
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function forzar($id){
        $user=User::query()->where('id',$id)->first();
        $membresia=membresia::query()->where('user_id',$user->id)->first();
        $nowTimeDate = new Carbon($membresia->fecha_cobro);
        $newTime = $nowTimeDate->addYear();
        $membresia->update([
            'fecha_cobro'=>$newTime,
            'type'=>"Comprada",
            'membresia_id'=>6
        ]);
        $externalUrl = 'https://app.tarjetajovendiamante.com/';
        return Redirect::to($externalUrl);
        return response()->json([
            'status'=>200
        ],200);
    }
    public function wordpress_email_forzar($id){
        $user=User::query()->where('email',$id)->first();
        if(!$user){
            $externalUrl = 'https://app.tarjetajovendiamante.com/';
            return Redirect::to($externalUrl);
        }
        $membresia=membresia::query()->where('user_id',$user->id)->first();
        $nowTimeDate = new Carbon($membresia->fecha_cobro);
        $newTime = $nowTimeDate->addYear();
        $membresia->update([
            'fecha_cobro'=>$newTime,
            'type'=>"Comprada",
            'membresia_id'=>6
        ]);
        Models::create([
            "payment"=>9.99,
            "user_id"=>$user->id,
            "referencia"=>"Wordpress payment",
            "verificado"=>1,
            "membresia_id"=>6,
        ]);
        $externalUrl = 'https://app.tarjetajovendiamante.com/';
        return Redirect::to($externalUrl);
    } 
     public function regalia(Request $request){
        try {
            DB::beginTransaction();
                $data=$request->all();
                $user=User::query()->where('id',$data['user_id'])->first();
                if(!$user){
                    throw new \Exception('usuario no encontrado',404);
                }
                $membresia=membresia::query()->where('user_id',$user->id)->first();
                if(!$membresia){
                    throw new \Exception('El usuario no tiene membresia',404);
                }
                if($membresia->type!='permitir_gratuita'){
                    throw new \Exception('El usuario ya obtuvo su prueba del sistema',404);
                }
                $nowTimeDate = new Carbon($membresia->fecha_cobro);
                $newTime = $nowTimeDate->addDays(3);
                $membresia->update([
                    'fecha_cobro'=>$newTime,
                    'type'=>"Prueba",
                    'membresia_id'=>1
                ]);
            DB::commit();
            return $membresia;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(
                $this->HelpError($e),
                404
            );
        }
    }

    public function update($id,Request $request){
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
    public function changes($id,Request $request){
        $datos=$request->all();
        $payment_menbresia=Models::where("id",$id)->first();
        $datos['verificado']=(
            $payment_menbresia->verificado == 0
        )? 1:0;
        $user=User::query()->where('id',$payment_menbresia->user_id)->first();
            if(!$user){
                throw new \Exception('usuario no encontrado',404);
            }
        $membresia=membresia::query()->where('user_id',$user->id)->first();
        if(!$membresia){
            throw new \Exception('El usuario no tiene membresia',404);
        }
        if($datos['verificado']==1){
            $nowTimeDate = new Carbon($membresia->fecha_cobro);
            $newTime = $nowTimeDate->addYear();
            $membresia->update([
                'fecha_cobro'=>$newTime,
                'type'=>"Comprada",
                'membresia_id'=>6
            ]);
        }
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $datos
        );
    }
    public function verificar($id){
        $payment_menbresia=Models::where("id",$id)->update(['verificado'=>1]);
        $envio=$this->sendMail("maur28363429rd@gmail.com",31825119,[
            "order_id" => $id,
        ]);
        $externalUrl = 'https://app.tarjetajovendiamante.com/';
        return Redirect::to($externalUrl);
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}

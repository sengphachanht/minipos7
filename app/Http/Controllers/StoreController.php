<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    //

    public function index(){

        $store = Store::orderBy('id','asc')->get();
        return $store;
    }

    public function edit($id){
        $store = Store::find($id);
        return $store;
    }

    public function add(Request $request){

        try{

            // $store = new Store();
            // $store->name = $request->name;
            // $store->amount = $request->amount;
            // $store->price_buy = $request->price_buy;
            // $store->price_sell = $request->price_sell;
            // $store->save();

                $store = Store::find($id);
                $store->update([
                    'name'=>$request->name,
                    'amount'=>$request->amount,
                    'price_buy'=>$request->price_buy,
                    'price_sell'=>$request->price_sell,
                    
                ]);


                $success = true;
                $message = "ບັນທຶກຂໍ້ມູນສຳເລັດ!";

            

        } catch (\Illuminate\Database\QueryException $ex){
            
            $success = false;
            $message = $ex->getMessage();

        }

        $response =[
            "success" => $success,
            "message" => $message
        ];

        return response()->json($response);
    }

    public function update($id, Request $request){

    }

}

//     public function login(Request $request){

//         $check_user_login = [
//             "emaila"=>$request->email,
//             "password"=>$request->password
//         ];

//         if(Auth::attempt($check_user_login)){

//             $success = true;
//             $message = "ເຂົ້າສູ່ລະບົບສຳເລັດ!";

//         } else {

//             $success = false;
//             $message = "ເຂົ້າສູ່ລະບົບບໍ່ສຳເລັດ!";

//         }

//         $response = [
//             "success" => $success,
//             "message" => $message
//         ];

//         return response()->json($response);

//     }
// }

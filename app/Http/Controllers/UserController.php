<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

use App\models\User;

class UserController extends Controller
{
    //

    public function register(Request $request){
        // return "OK Register!!";

        try{

            $check_email = User::where("email",$request->email);
            
            if($check_email->count()){
                $success = false;
                $message = "ອີເມວລ໌ນີ້: ".$reguest->email." ໄດ້ເຄີຍລົງທະບຽນແລ້ວ!";

            } else {

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = hash::make($request->password);
                $user->save();
        
                $success = true;
                $message = "ບັນທຶກຂໍ້ມູນສຳເລັດ!";

            }

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

    public function login(Request $request){

        $check_user_login = [
            "email"=>$request->email,
            "password"=>$request->password
        ];

        if(Auth::attempt($check_user_login)){

            $success = true;
            $message = "ເຂົ້າສູ່ລະບົບສຳເລັດ!";

        } else {

            $success = false;
            $message = "ເຂົ້າສູ່ລະບົບບໍ່ສຳເລັດ!";

        }

        $response = [
            "success" => $success,
            "message" => $message
        ];

        return response()->json($response);
    }

    public function logout(){

        Session::flush();

        $response = [
            "success" => true,
            "message" => "ສຳເລັດ"
        ];

        return response()->json($response);

    }

}

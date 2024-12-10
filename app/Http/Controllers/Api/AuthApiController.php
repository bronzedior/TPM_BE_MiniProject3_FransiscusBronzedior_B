<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    //
    public function Register(Request $request){
        $MyData = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        try{
            $user = User::create($MyData);
        }catch(\Exception $e){
            // return response()->json([])
            return response(['error'=>$e->getMessage()], 500);
        }
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['user'=>$user, 'accesstoken'=>$token], 201);
    }

    public function Login(Request $request){
        $loginData = $request->validate([
            'email'=>'required'|'email',
            'password'=>'required',
        ]);
        if(!auth()->attempt($loginData)){
            return response()->json(['error'=> 'your credential is not valid'], 500);
        }
        // $user = auth()->user();
        $user = auth()->user();
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['user'=>$user, 'accesstoken'=>$token], 200);
    }
}

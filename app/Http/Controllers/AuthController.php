<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function ShowRegisterForm(){
        return view('auth.register');
    }

    public function Register(Request $request){
        try{
            // dd($request);
            $request ->validate([
                    'name'=>'required|string|max:255',
                    'email'=>'required|string|max:255|unique:users',
                    'password'=>'required|string|min:8'
                ]
            );
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('login')->with('success', 'successfully registered');
        } catch(\Exception $e){
            dump($e->getMessage());
            // return back()->withErrors(provider: 'error', key: "error occured please check input");
        }
    }

    public function ShowLoginForm(){
        return view('auth.login');
    }

    public function Login(Request $request){
        try{
            $request->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);

            if(Auth::attempt(credentials: $request->only('email', 'password'))){
                $request->session()->regenerate();

                return redirect()->route('welcome')->with('success', 'successfully login');
            }else{
                // dump('login failed credentials is not found please try again');
                return back()->with('error','Credentials not found');
            }
        }catch(\Exception $e){
                dump($e->getMessage());
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

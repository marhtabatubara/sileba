<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('do_logout');
    }

    public function login(){
        return view("pages.auth.main");
    }

    public function do_login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $check = Pengguna::where("username", $request->username)->count();
        if ($check) {
            if (Auth::attempt($request->only('username','password'))) {
                if(Auth::user()->role == 'g'){
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Selamat Datang Kembali Guru ' . Auth::user()->username,
                        'callback' => route('guru.dashboard'),
                    ]);
                }elseif(Auth::user()->role == 's'){
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Selamat Datang Kembali Siswa ' . Auth::user()->username,
                        'callback' => route('siswa.dashboard'),
                    ]);
                }elseif(Auth::user()->role == 'o'){
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Selamat Datang Kembali Operator ' . Auth::user()->username,
                        'callback' => route('admin.dashboard'),
                    ]);
                }
            }
            else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Wrong Password!',
                ]);
            }
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'username not match with our credentials!',
            ]);
        }
    }
    public function do_logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

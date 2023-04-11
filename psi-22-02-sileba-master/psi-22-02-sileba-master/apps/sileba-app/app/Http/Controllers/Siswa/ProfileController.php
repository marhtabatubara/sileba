<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.main');
    }
    
    public function cprofile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:8',
            'username' => 'required|unique:pengguna,username,'.Auth::user()->nisn.',nisn',
            'email' => 'required|max:255|unique:siswa,email,'.Auth::user()->nisn.',nisn',
            'nisn' => 'numeric|nullable|unique:siswa,nisn,'.Auth::user()->nisn.',nisn','|unique:pengguna,nisn,'.Auth::user()->nisn.',nisn',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
           if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            } elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('nisn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nisn'),
                ]);
            }
        }
        $profile = Siswa::where('nisn',Auth::user()->nisn)->first();
        $profile->nama = $request->nama;
        $profile->nisn = $request->nisn;
        $profile->email = $request->email;
        $profile->update();
        $pengguna = Pengguna::where('nisn',Auth::user()->nisn)->first();
        $pengguna->username  = $request->username;
        $pengguna->nisn = $profile->nisn;
        $pengguna->update();

        if($request->password){
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8',
                'password_baru' => 'required|min:8',
                'kpassword_baru' => 'same:password_baru|min:8',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
               if ($errors->has('password')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('password'),
                    ]);
                } elseif ($errors->has('password_baru')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('password_baru'),
                    ]);
                } elseif ($errors->has('kpassword_baru')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('kpassword_baru'),
                    ]);
                }
            }
            $pengguna = Pengguna::where('nisn',Auth::user()->nisn)->first();
            $pengguna->password = Hash::make($request->password_baru);
            $pengguna->update();
            Auth::logout($pengguna);
            return response()->json([
                'alert' => 'success',
                'message' => 'Profil Berhasil diubah',
                'route' => route('auth.login'),
            ]);
        }else{
            return response()->json([
                'alert' => 'success',
                'message' => 'Profil Berhasil diubah',
                'reload' => 'reload',
            ]);
        }
    }
}

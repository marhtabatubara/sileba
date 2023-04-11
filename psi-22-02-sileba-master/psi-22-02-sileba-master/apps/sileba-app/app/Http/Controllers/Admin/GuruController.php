<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Guru::
            where('nama','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.admin.guru.list', compact('collection'));
        }
        return view('pages.admin.guru.main');
    }
    public function create()
    {
        return view('pages.admin.guru.input', ['guru' => new Guru]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'numeric|nullable|unique:guru,nip|unique:pengguna,nip',
            'nama' => 'required',
            'email' => 'required|unique:guru,email|max:255',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:pengguna,username',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nip')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nip'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('tgl_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tgl_lahir'),
                ]);
            }elseif ($errors->has('agama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('agama'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('jenis_kelamin')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis_kelamin'),
                ]);
            }elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new Guru;
        $user->nip = $request->nip;
        $user->nama = Str::title($request->nama);
        $user->email = $request->email;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->agama = Str::upper($request->agama);
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $account = new Pengguna;
        $account->role = 'g';
        $account->nip = $user->nip;
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $account->created_at = now();
        $account->updated_at = now();
        $account->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Guru '. $request->nama . ' tersimpan',
        ]);
    }
    public function show(Guru $guru)
    {
        //
    }
    public function edit(Guru $guru)
    {
        return view('pages.admin.guru.input', compact('guru'));
    }
    public function update(Request $request, Guru $guru)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'numeric|nullable|unique:guru,nip,'.$guru->nip.',nip','|unique:pengguna,nip,'.$guru->nip.',nip',
            'nama' => 'required',
            'email' => 'required|max:255|unique:guru,email,'.$guru->nip.',nip',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:pengguna,username,'.$guru->nip.',nip',
            'password' => 'nullable|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nip')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nip'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('tgl_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tgl_lahir'),
                ]);
            }elseif ($errors->has('agama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('agama'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('jenis_kelamin')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis_kelamin'),
                ]);
            }elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $guru->nip = $request->nip;
        $guru->nama = Str::title($request->nama);
        $guru->email = $request->email;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->agama = Str::upper($request->agama);
        $guru->alamat = $request->alamat;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->updated_at = now();
        $guru->update();

        $account = Pengguna::where('nip', $guru->nip)->first();
        $account->nip = $guru->nip;
        $account->username = $request->username;
        if($request->password){
            $account->password = Hash::make($request->password);
        }
        $account->updated_at = now();
        $account->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Guru '. $request->nama . ' diubah',
        ]);
    }
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Guru '. $guru->nama . ' terhapus',
        ]);
    }
}

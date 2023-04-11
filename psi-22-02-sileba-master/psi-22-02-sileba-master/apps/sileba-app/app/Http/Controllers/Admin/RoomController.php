<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Client\Request as ClientRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Room::where('kode_kelas','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.admin.room.list', compact('collection'));
        }
        return view('pages.admin.room.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.room.input', ['room' => new Room]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_kelas' => 'required',
            'tahun' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('kode_kelas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kode_kelas'),
                ]);
            }elseif ($errors->has('tahun')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tahun'),
                ]);
            }
        }
        $room = new Room;
        $room->kode_kelas = $request->kode_kelas;
        $room->tahun = $request->tahun;
        $room->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kelas '. $request->kode_kelas . ' tersimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('pages.admin.room.input', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $validator = Validator::make($request->all(), [
            'kode_kelas' => 'required',
            'tahun' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('kode_kelas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kode_kelas'),
                ]);
            }elseif ($errors->has('tahun')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tahun'),
                ]);
            }
        }
        $room->kode_kelas = $request->kode_kelas;
        $room->tahun = $request->tahun;
        $room->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kelas '. $request->kode_kelas . ' terupdate',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Room '. $room->title . ' terhapus',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Ringtone;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ringtones = Ringtone::all();
        return view('admin.kelolaRingtone', compact('ringtones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambahRingtone(Request $request)
    {
        $input = $request->all();
        $file = $request->file('ringtone');
        $namefile = $request->file('ringtone')->getClientOriginalName();
        // $input['path'] = null;

        $input['path'] = '/upload/ringtones/'.$namefile.'.'.$request->ringtone->getClientOriginalExtension();
        $request->ringtone->move(public_path('/upload/ringtone'), $input['ringtone']);

        if(Ringtone::create($input)) {
            return redirect('ringtone')->with('alert success', 'Ringtone berhasil ditambahkan!');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apiRingtone() {

        $ringtones = Ringtone::all();

        return DataTables::of($ringtones)
        ->addColumn('action', function($ringtones) {
            return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicom glymphicom-eye-open"></i>Play</a>'.
                '<a onclick="editRingtone('.$ringtones->id_ringtone.')" class="btn btn-primary btn-xs"><i
                    class="glyphicom glyphicom-edit"></i>Edit</a>'.
                '<a onclick="deleteRingtone('.$ringtones->id_ringtone.')" class="btn btn-danger btn-xs"><i
                    class="glyphicom glyphicom-trash"></i>Delete</a>';            
        })->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;


use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::orderBy('id', 'desc')->get();
        return view('admin.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $jabatan = Jabatan::all();
        return view('admin.karyawan.create', compact('karyawan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $karyawan = new Karyawan;
        $karyawan->nama = $request->nama;
        $karyawan->id_jabatan = $request->id_jabatan;
        $karyawan->alamat = $request->alamat;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->save();

        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nama = $request->nama;
        // $karyawan->jabatan = $request->jabatan;
        $karyawan->alamat = $request->alamat;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        // $karyawan->email = $request->email;
        // $karyawan->role = $request->role;
        $karyawan->password = Hash::make($request->password);
        $karyawan->save();

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        //
    }
}

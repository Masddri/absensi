<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = User::all();
        $absensi = Absensi::all();
        return view('admin.absensi.index', compact('absensi', 'karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = User::all();
        $absensi = Absensi::all();
        return view('admin.absensi.create', compact('absensi', 'karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Jika ini adalah absen masuk
    if ($request->has('absen_masuk')) {
        // Simpan data jam masuk
        $absensi = new Absensi();
        // $absensi->nama_karyawan = $request->nama_karyawan;
        // $absensi->jabatan = $request->jabatan;
        $absensi->id_user = auth()->id(); // Ambil karyawan ID dari user yang login
        $absensi->jam_masuk = now(); // Set jam masuk saat ini
        $absensi->save();

        // Set session absen masuk
        session(['absen_masuk' => now()]);

        return redirect()->route('absensi.index')->with('success', 'Absen masuk berhasil');
    }

    // Jika ini adalah absen pulang
    if ($request->has('absen_pulang')) {
        // Ambil data absensi yang ada dan update jam keluar
        $absensi = Absensi::where('id_user', auth()->id())
                          ->whereNull('jam_keluar')
                          ->first();
        if ($absensi) {
            $absensi->jam_keluar = now(); // Set jam pulang saat ini
            $absensi->save();

            // Set session absen pulang
            session(['absen_pulang' => now()]);

            return redirect()->route('absensi.index')->with('success', 'Absen pulang berhasil');
        }

        return redirect()->route('absensi.index')->with('error', 'Anda belum absen masuk');
    }

    return redirect()->route('absensi.index')->with('error', 'Aksi tidak valid');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }




    // Buat Absen Masuk
    // public function absenMasuk(Request $request) {
    //     // Simpan Waktu absen masuk

    //     Session::put('jam_masuk', now());

    //     return redirect()->back();
    // }

    // // Buat Absen Pulang
    // public function absenPulang(Request $request) {
    //     // Simpan Waktu absen pulang

    //     Session::put('jam_pulang', now());

    //     return redirect()->back();
    // }
}

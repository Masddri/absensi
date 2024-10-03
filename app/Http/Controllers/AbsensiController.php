<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::now()->setTimezone('Asia/Jakarta')->format('d-m-Y H-i-s');

        $karyawan = User::all();
        $absensi = Absensi::all();
        return view('admin.absensi.index', compact('absensi', 'karyawan', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d H-i-s');

        $karyawan = Karyawan::all();
        $absensi = Absensi::all();
        return view('admin.absensi.create', compact('absensi', 'karyawan', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Method store untuk absensi dengan array
    // public function store(Request $request) //ini tidak menggunakan reset
    // {
    //     // Cek apakah user melakukan absen masuk
    //     if ($request->has('absen_masuk')) {
    //         $karyawanIds = $request->input('id_karyawan'); // Ambil array id_karyawan

    //         foreach ($karyawanIds as $id_karyawan) {
    //             // Simpan absen masuk ke database
    //             $absensi = new Absensi();
    //             $absensi->id_karyawan = $id_karyawan;
    //             $absensi->jam_masuk = Carbon::now()->setTimezone('Asia/Jakarta'); // Set waktu absen masuk sekarang
    //             $absensi->save();
    //         }

    //         // Reset session untuk id_karyawan yang baru
    //         Session::put('absen_masuk', true);
    //         Session::put('id_karyawan', $karyawanIds); // Simpan ID karyawan yang absen

    //         return redirect()->route('absensi.index')->with('success', 'Absen masuk berhasil untuk karyawan yang dipilih.');
    //     }

    //     // Cek apakah user melakukan absen pulang
    //     if ($request->has('absen_pulang')) {
    //         if (Session::has('absen_masuk')) {
    //             $karyawanIds = $request->input('id_karyawan'); // Ambil array id_karyawan

    //             foreach ($karyawanIds as $id_karyawan) {
    //                 // Update waktu absen pulang
    //                 $absensi = Absensi::where('id_karyawan', $id_karyawan)
    //                     ->whereNull('jam_pulang') // Pastikan absen pulang belum diisi
    //                     ->first();

    //                 if ($absensi) {
    //                     $absensi->jam_pulang = Carbon::now()->setTimezone('Asia/Jakarta');
    //                     $absensi->save();
    //                 }
    //             }

    //             // Reset session absen_masuk dan set absen_pulang
    //             Session::forget('absen_masuk');
    //             Session::put('absen_pulang', true);
    //             return redirect()->back()->with('success', 'Absen pulang berhasil untuk karyawan yang dipilih.');
    //         } else {
    //             return redirect()->back()->with('error', 'Anda harus absen masuk terlebih dahulu.');
    //         }
    //     }

    //     return redirect()->back()->with('error', 'Terjadi kesalahan.');
    // }

    public function store(Request $request) //ini menggunakan reset
    {
        // Ambil tanggal hari ini
        $today = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');

        // Cek jika tanggal hari ini berbeda dengan tanggal terakhir yang ada di session
        if (Session::has('last_absen_date') && Session::get('last_absen_date') !== $today) {
            // Reset session jika hari sudah berubah
            Session::forget('absen_masuk');
            Session::forget('id_karyawan');
            Session::forget('last_absen_date');
        }

        // Simpan tanggal hari ini di session
        Session::put('last_absen_date', $today);

        // Cek apakah user melakukan absen masuk
        if ($request->has('absen_masuk')) {
            $karyawanIds = $request->input('id_karyawan'); // Ambil array id_karyawan

            foreach ($karyawanIds as $id_karyawan) {
                // Simpan absen masuk ke database
                $absensi = new Absensi();
                $absensi->id_karyawan = $id_karyawan;
                $absensi->jam_masuk = Carbon::now()->setTimezone('Asia/Jakarta'); // Set timezone ke WIB
                $absensi->save();
            }

            // Reset session untuk id_karyawan yang baru
            Session::put('absen_masuk', true);
            Session::put('id_karyawan', $karyawanIds); // Simpan ID karyawan yang absen

            return redirect()->route('absensi.index')->with('success', 'Absen masuk berhasil untuk karyawan yang dipilih.');
        }

        // Cek apakah user melakukan absen pulang
        if ($request->has('absen_pulang')) {
            if (Session::has('absen_masuk')) {
                $karyawanIds = $request->input('id_karyawan'); // Ambil array id_karyawan

                foreach ($karyawanIds as $id_karyawan) {
                    // Update waktu absen pulang
                    $absensi = Absensi::where('id_karyawan', $id_karyawan)
                        ->whereNull('jam_pulang') // Pastikan absen pulang belum diisi
                        ->first();

                    if ($absensi) {
                        $absensi->jam_pulang = Carbon::now()->setTimezone('Asia/Jakarta'); // Set timezone ke WIB
                        $absensi->save();
                    }
                }

                // Reset session absen_masuk dan set absen_pulang
                Session::forget('absen_masuk');
                Session::put('absen_pulang', true);
                return redirect()->back()->with('success', 'Absen pulang berhasil untuk karyawan yang dipilih.');
            } else {
                return redirect()->back()->with('error', 'Anda harus absen masuk terlebih dahulu.');
            }
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = Karyawan::all();
        $absensi = Absensi::findOrFail($id);
        return view('admin.absensi.edit', compact('absensi', 'karyawan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $absensi = Absensi::find($id);

        if ($absensi && is_null($absensi->jam_keluar)) {
            $absensi->jam_keluar = Carbon::now()->setTimezone('Asia/Jakarta'); // Simpan jam keluar
            $absensi->save();

            Session::forget('absen_masuk');
            Session::put('absen_keluar', true);

            return redirect()->route('absensi.index')->with('success', 'Absen keluar berhasil.');
        }

        return redirect()->route('absensi.index')->with('error', 'Terjadi kesalahan.');
    }

}

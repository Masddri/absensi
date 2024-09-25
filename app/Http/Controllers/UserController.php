<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Role;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', Role::class]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = User::orderBy('id', 'desc')->get();
        return view('admin.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = User::all();
        return view('admin.karyawan.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $karyawan = new User;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->alamat = $request->alamat;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->email = $request->email;
        $karyawan->role = $request->role;
        $karyawan->password = Hash::make($request->password);
        $karyawan->save();

        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = User::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->alamat = $request->alamat;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->email = $request->email;
        $karyawan->role = $request->role;
        $karyawan->password = Hash::make($request->password);
        $karyawan->save();

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index');
    }
}

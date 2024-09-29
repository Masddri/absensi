@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Absen Pulang</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Konfirmasi Absen Pulang</h5>
                        <small class="text-muted float-end">PT.Tritama Aji Laksana</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $absensi->karyawan->nama }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jam Masuk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $absensi->jam_masuk }}" readonly>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Konfirmasi Absen Pulang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

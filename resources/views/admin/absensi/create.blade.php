@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Absensi</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Absensi</h5>
              <small class="text-muted float-end">PT.Tritama Aji Laksana</small>
            </div>
            <div class="card-body">
              <!-- Form Absensi -->
              <form action="{{ route('absensi.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Absensi</label>
                  <div class="col-sm-10">
                    <select name="nama_karyawan" class="form-control" id="karyawan" required>
                        <option selected disabled>-- Nama Karyawan --</option>
                        @foreach ($karyawan as $data)
                        <option value="{{ $data->id }}" data-jabatan="{{ $data->karyawan }}">{{ $data->nama_karyawan }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Jabatan</label>
                  <div class="col-sm-10">
                    <select name="jabatan" id="jabatan" class="form-control" disabled>
                        <option>-- Pilih Jabatan --</option>
                    </select>
                  </div>
                </div>
              </form>

              <!-- Form untuk Absen Masuk -->
<form action="{{ route('absensi.store') }}" method="POST">
    @csrf
    <button type="submit" name="absen_masuk" class="btn btn-primary" {{ session('absen_masuk') ? 'disabled' : '' }}> Absen Masuk </button>
</form>

<!-- Form untuk Absen Pulang -->
<form action="{{ route('absensi.store') }}" method="POST">
    @csrf
    <button type="submit" name="absen_pulang" class="btn btn-secondary" {{ session('absen_masuk') && !session('absen_pulang') ? '' : 'disabled' }}> Absen Pulang </button>
</form>

            </div>
          </div>
        </div>
      </div>
</div>
@endsection

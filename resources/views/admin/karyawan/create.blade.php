@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Karyawan</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Basic Layout</h5>
              <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
              <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Karyawan</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="basic-default-name" placeholder="Masukan Nama!" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Jabatan</label>
                  <div class="col-sm-10">
                    <select name="id_jabatan" class="form-control" id="jabatan" required>
                        <option selected disabled>-- Nama Absensi --</option>
                        @foreach ($jabatan as $data)
                        <option value="{{ $data->id }}" data-jabatan="{{ $data->jabatan }}">{{ $data->nama_jabatan }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select name="jenis_kelamin" class="form-control">
                        <option selected disabled>-- Pilih Jenis Kelamin Anda --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

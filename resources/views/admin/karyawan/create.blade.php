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
                    <input type="text" name="nama_karyawan" class="form-control" id="basic-default-name" placeholder="Masukan nama!" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Jabatan</label>
                  <div class="col-sm-10">
                    <select name="jabatan" class="form-control">
                        <option selected disabled>-- Pilih Jabatan Anda --</option>
                        <option value="Document Controller">Document Controller</option>
                        <option value="Quality Control">Quality Control</option>
                        <option value="Warehouse Personel">Warehouse Personel</option>
                        <option value="Site Koordinator">Site Koordinator</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="Admin keuangan personel">Admin keuangan personel</option>
                        <option value="Leader Admin Keuangan">Leader Admin Keuangan</option>
                        <option value="Leader ESAR">Leader ESAR</option>
                        <option value="Project Controller">Project Controller</option>
                        <option value="Leader PIC Warehouse">Leader PIC Warehouse</option>
                        <option value="Regional Project Manager">Regional Project Manager</option>
                        <option value="OB">OB</option>
                        <option value="Leader Quality Control">Leader Quality Control</option>
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
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="basic-default-name" placeholder="Masukan Email!" required="email" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Role</label>
                  <div class="col-sm-10">
                    <select name="role" class="form-control">
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="basic-default-name" placeholder="Masukan password!" required="password" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Konfirmasi Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control" id="basic-default-name" placeholder="Masukan password!" required="password" />
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

@extends('layouts.admin.template')
@section('content')
{{-- <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Absensi</h4>
    <div class="card">
        <h5 class="card-header">Absensi <a href="{{ route('absensi.create') }}" class="btn btn-sm btn-primary"
                style="float: right">Absen <i class="bi bi-plus-circle"></i></a></h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($absensi as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->karyawan->nama }}</td>
                        <td>{{ $data->karyawan->jabatan->nama_jabatan }}</td>
                        <td>{{ $data->jam_masuk }}</td>
                        <td>{{ $data->jam_keluar ?? 'Belum Absen Pulang' }}</td>
                        <td>
                            @if (is_null($data->jam_keluar))
                            <a href="{{ route('absensi.edit', $data->id) }}" class="btn btn-warning">
                                Absen Pulang
                            </a>
                            @else
                            <button class="btn btn-secondary" disabled>Sudah Absen Pulang</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Absensi Hari Ini {{ $today }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('absensi.store') }}" method="POST">
                        @csrf
                        <h5>Masuk</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Waktu Masuk</label>
                                    <input type="time" class="form-control" id="basic-default-fullname"/>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Lokasi Absensi</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Lokasi Absensi" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nama Karyawan</label>
                                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                        <option selected disabled>-- Nama Karyawan --</option>
                                        @foreach ($karyawan as $data)
                                            <option value="{{ $data->id }}"
                                                {{ session('id_karyawan') && in_array($data->id, session('id_karyawan')) ? 'disabled' : '' }}
                                                data-jabatan="{{ $data->jabatan->nama_jabatan }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Pulang</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Waktu Pulang</label>
                                    <input type="time" class="form-control" id="basic-default-fullname"/>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Lokasi Absensi</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Lokasi Absensi" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nama Karyawan</label>
                                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                        <option selected>Nama Karyawan</option>
                                        <option value="">{{ $karyawan }}</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                        <!-- Tombol Absen Masuk -->
                        <button type="submit" name="absen_masuk" class="btn btn-primary"
                        {{ session('absen_masuk') ? '' : '' }}> Absen Masuk </button>

                    <!-- Tombol Absen Pulang -->
                    <button type="submit" name="absen_pulang" class="btn btn-secondary"
                        {{ !session('absen_masuk') ? 'disabled' : '' }}> Absen Pulang </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

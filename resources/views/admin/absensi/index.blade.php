@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
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
    </div>
@endsection

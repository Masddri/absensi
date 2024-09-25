@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Absensi</h4>
    <div class="card">
        <h5 class="card-header">Absensi <a href="{{ route('absensi.create') }}"
            class="btn btn-sm btn-primary" style="float: right">Tambah    <i class="bi bi-plus-circle"></i></a></h5>
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
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->karyawan->nama_karyawan}}</td>
                    <td>{{$data->karyawan->jabatan}}</td>
                    <td>{{$data->jam_masuk}}</td>
                    <td>{{$data->jam_keluar}}</td>
                    <td>
                        <form action="{{route('absensi.destroy', $data->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('absensi.edit', $data->id) }}"
                                    ><i class="bx bx-edit-alt me-2"></i> Edit</a
                                >
                                <button class="dropdown-item" type="submit"
                                    ><i class="bx bx-trash me-2"></i> Delete</
                                >
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>
@endsection

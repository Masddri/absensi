@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Karyawan</h4>
    <div class="card">
        <h5 class="card-header">Karyawan <a href="{{ route('karyawan.create') }}"
            class="btn btn-sm btn-primary" style="float: right">Tambah    <i class="bi bi-plus-circle"></i></a></h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Role</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($karyawan as $data)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->nama_karyawan}}</td>
                    <td>{{$data->jabatan}}</td>
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        @if ($data->role == 1)
                            Admin
                        @else
                            User
                        @endif
                    </td>
                    <td>{{$data->alamat}}</td>
                    <td>
                        <form action="{{route('karyawan.destroy', $data->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('karyawan.edit', $data->id) }}"
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

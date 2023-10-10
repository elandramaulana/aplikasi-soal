@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
   <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
                <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('matkul') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>   Tambah Matkul</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Matkul</th>
                                            <th>Kode Matkul</th>
                                            <th>Jumlah SKS</th>
                                            <th>Semester</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($matkul as $m)
                                        <tr>
                                            <td>{{ $m->nama_matkul }}</td>
                                            <td>{{ $m->kode_matkul }}</td>
                                            <td>{{ $m->sks }}</td>
                                            <td>{{ $m->semester }}</td>
                                            <td>
                                                @php
                                                    $dosenArray = explode('|', $m->dosen);
                                                @endphp

                                                @foreach ($dosenArray as $dosen)
                                                    {{ trim($dosen) }}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="/{{ $m->id }}/cpmk" class="btn btn-success btn-sm ml-2">CPMK</a>
                                                    <a href="/matkul-edit/{{ $m->id }}" class="btn btn-primary btn-sm ml-2">Edit</a>
                                                    <a href="/matkul/{{ $m->id }}" class="btn btn-danger btn-sm ml-2">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
            </div>
        </div>
@endsection

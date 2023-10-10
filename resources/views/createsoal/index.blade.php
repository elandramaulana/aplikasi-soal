@extends('layout.app')

@section('title', 'Generate Soal')

@section('content')
              <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Generate Soal Ujian</h1>
        <!-- DataTales Example -->
<div class="card shadow mb-4">
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
                                            <a href="/{{ $m->id }}/generate-soal" class="btn btn-primary btn-sm mr-2">Buat Soal</a>
                                            <a href="/{{ $m->id }}/paket-soal" class="btn btn-success btn-sm">Lihat Soal</a>
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

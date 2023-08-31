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
                                    <th>Jumlah SKS</th>
                                    <th>Dosen Pengampu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sinyal Dan Sistem</td>
                                    <td>2</td>
                                    <td>
                                        Ir. Eng Budi Rahmadya <br>
                                        Rizka Hadelina, M.T
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('makesoalujian') }}" class="btn btn-primary btn-sm">Buat Soal</a>
                                        </div>
                                    </td>
                                </tr>
                      </tbody>
                </table>
          </div>
    </div>
</div>

@endsection
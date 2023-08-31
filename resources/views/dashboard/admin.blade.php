@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
   <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
                <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('addmatkul') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>   Tambah Matkul</a>
                        </div>
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
                                                    <a href="{{ route('edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('cpmk') }}" class="btn btn-success btn-sm ml-2">CPMK</a>
                                                </div>
                                            </td>
                                        </tr>
                              </tbody>
                        </table>
                  </div>
            </div>
        </div>
@endsection
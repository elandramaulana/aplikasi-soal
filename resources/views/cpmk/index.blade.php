@extends('layout.app')

@section('title', 'CPMK')

@section('content')
   <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">CPMK</h1>
                <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('addcpmk') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>   Tambah CPMK</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>CPMK</th>
                                            <th>Keterangan</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CPMK 1</td>
                                            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium dolores maxime voluptatum, error sint voluptas!</td>
                                            <td>Ir. Eng Budi Rahmadya</td>
                                            <td>
                                                <a href="{{ route('addsoal') }}" class="btn btn-primary btn-sm">Tambah Soal</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CPMK 2</td>
                                            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores deleniti facilis non.</td>
                                            <td>Rizka Hadelina, M.T</td>
                                            <td>
                                                <a href="{{ route('addsoal') }}" class="btn btn-primary btn-sm">Tambah Soal</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CPMK 3</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, totam nisi!</td>
                                            <td>Nefy Puteri Novani, M.T</td>
                                            <td>
                                                <a href="{{ route('addsoal') }}" class="btn btn-primary btn-sm">Tambah Soal</a>
                                            </td>
                                        </tr>
                              </tbody>
                        </table>
                  </div>
            </div>
        </div>
@endsection
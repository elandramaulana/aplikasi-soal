@extends('layout.app')

@section('title', 'CPMK')

@section('content')
   <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">CPMK</h1>
                <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            @foreach($matkul as $m)
                                <a href="/{{ $m->id }}/addcpmk" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>   Tambah CPMK</a>
                            @endforeach

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
                                    @foreach($cpmk as $c)
                                        <tr>
                                                <td>CPMK-{{ $c->cpmk }}</td>
                                                <td>{{ $c->keterangan }}</td>
                                                @foreach($matkul as $m)
                                                <td>
                                                    @php
                                                        $dosenArray = explode('|', $m->dosen);
                                                    @endphp

                                                    @foreach ($dosenArray as $dosen)
                                                        {{ trim($dosen) }}<br>
                                                    @endforeach
                                                </td>
                                                @endforeach
                                                <td>
                                                    <a href="/{{ $c->id }}/addsoal" class="btn btn-success btn-sm">Add Soal</a>
                                                    <a href="/{{ $c->id }}/soal" class="btn btn-primary btn-sm mt-2">Show Soal</a>
{{--                                                    <a href="/cpmk-edit/{{ $c->id }}" class="btn btn-primary btn-sm">Edit</a>--}}
                                                    <a href="/cpmk/{{ $c->id }}" class="btn btn-danger btn-sm mt-2  ">Hapus</a>
                                                </td>
                                        </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>
            </div>
        </div>
@endsection

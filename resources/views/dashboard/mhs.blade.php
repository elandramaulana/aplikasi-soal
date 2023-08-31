@extends('layout.appmhs')

@section('title', 'Dashboard')

@section('contentmhs')
   <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ujian Mahasiswa</h1>
                <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        {{-- <div class="card-header py-3">
                            <a href="{{ route('addmatkul') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>   Tambah Matkul</a>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Matkul</th>
                                            <th>Jumlah SKS</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Asesmen Unjuk Kerja</th>
                                            <th>Asesmen Tertulis</th>
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
                                                <a href="" class="btn btn-info btn-sm">Unduh Rubrik</a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('ujian') }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#confirmationModal">Kerjakan Ujian</a>
                                                    <a href="{{ route('remedial') }}" class="btn btn-success btn-sm ml-2">Remedial</a>
                                                </div>
                                            </td>
                                        </tr>
                              </tbody>
                        </table>
                  </div>
            </div>
        </div>


        <!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin memulai ujian? Anda akan diberikan waktu 75 menit untuk menyelesaikan ujian.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="{{ route('ujian') }}" class="btn btn-primary">Mulai Ujian</a>
            </div>
        </div>
    </div>
</div>
@endsection
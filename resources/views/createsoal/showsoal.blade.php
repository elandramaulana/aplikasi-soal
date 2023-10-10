@extends('layout.app')

@section('title', 'Generate Soal')

@section('content')
              <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Show Soal Ujian</h1>
        <!-- DataTales Example -->
<div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Tampilkan Soal Objective -->
                        <h2>Soal Objective</h2>
                        <ul>
                            @foreach ($objectiveSoal as $objective)
                                <li>{{ $objective['question'] }}</li>
                                @if(!empty($objective['question_photo']))
                                    <img src="{{ asset('storage/objective/' . $objective['cpmk_id'] . '/' .$objective['question_photo']) }}" alt="Gambar Soal">
                                @endif
                                <ul>
                                    <li>A. {{ $objective['answer_a'] }}</li>
                                    <li>B. {{ $objective['answer_b'] }}</li>
                                    <li>C. {{ $objective['answer_c'] }}</li>
                                    <li>D. {{ $objective['answer_d'] }}</li>
                                </ul>
                            @endforeach
                        </ul>

                        <!-- Tampilkan Soal Essay -->
                        <h2>Soal Essay</h2>
                        <ul>
                            @foreach ($essaySoal as $essay)
                                <li>{{ $essay['question'] }}</li>
                                @if(!empty($essay['question_photo']))
                                    <img src="{{ asset('storage/essay/' . $essay['cpmk_id'] . '/' .$essay['question_photo']) }}" alt="Gambar Soal">
                                @endif
                            @endforeach
                        </ul>
                        <div class="btn-group">
                            @if ($matkul_id)
                                <a href="/paket-soal/{{ $matkul_id->matkul_id }}" class="btn btn-danger btn-sm">Hapus Paket Soal</a>
                            @endif

                        </div>
                    </div>
    </div>
</div>

@endsection

@extends('layout.app')

@section('title', 'Show Soal CPMK')

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
                    @foreach ($soalObjective as $objective)
                        <li>{{ $objective->objective_question }}</li>
                        @if(!empty($objective->objective_question_photo))
                            <img src="{{ asset('storage/objective/' . $objective->cpmk_id . '/' .$objective->objective_question_photo) }}" alt="Gambar Soal">
                        @endif
                        <ul>
                            <li>A. {{ $objective->objective_answer_a }}</li>
                            <li>B. {{ $objective->objective_answer_b }}</li>
                            <li>C. {{ $objective->objective_answer_c }}</li>
                            <li>D. {{ $objective->objective_answer_d }}</li>
                        </ul>
                    @endforeach
                </ul>

                <!-- Tampilkan Soal Essay -->
                <h2>Soal Essay</h2>
                <ul>
                    @foreach ($soalEssay as $essay)
                        <li>{{ $essay->essay_question }}</li>
                        @if(!empty($essay->essay_question_photo))
                            <img src="{{ asset('storage/essay/' . $essay->cpmk_id . '/' .$essay->essay_question_photo) }}" alt="Gambar Soal">
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection

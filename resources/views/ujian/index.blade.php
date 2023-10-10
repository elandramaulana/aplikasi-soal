<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Pengolahan Sinyal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #3498db, #028a36);
            color: rgb(0, 0, 0);
        }
        .main-card {
            background: rgba(204, 204, 204, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin: 50px auto;
            width: 100%;
        }
        .question-card {
            background:  rgb(255, 255, 255);
            border-radius: 10px;
            padding: 15px;
            margin: 20px auto;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="main-card">
                <h2 class="text-center mb-4">Tampilan Soal Ujian</h2>
                <p class="text-center">Timer: <span id="timer">75:00</span></p>

                <!-- Tampilkan Soal Objective -->
                @foreach ($objectiveSoal as $key => $objective)
                    <div class="question-card">
                        <h5>Objective Question {{ $key + 1 }}:</h5>
                        <p>{{ $objective['question'] }}</p>
                        @if(!empty($objective['question_photo']))
                            <img style="text-align: center" src="{{ asset('storage/objective/' . $objective['cpmk_id'] . '/' .$objective['question_photo']) }}" alt="Gambar Soal">
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective{{ $key }}" id="objective{{ $key }}a" value="a">
                            <label class="form-check-label" for="objective{{ $key }}a">A) {{ $objective['answer_a'] }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective{{ $key }}" id="objective{{ $key }}b" value="b">
                            <label class="form-check-label" for="objective{{ $key }}b">B) {{ $objective['answer_b'] }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective{{ $key }}" id="objective{{ $key }}c" value="c">
                            <label class="form-check-label" for="objective{{ $key }}c">C) {{ $objective['answer_c'] }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective{{ $key }}" id="objective{{ $key }}d" value="d">
                            <label class="form-check-label" for="objective{{ $key }}d">D) {{ $objective['answer_d'] }}</label>
                        </div>
                    </div>
                @endforeach

                <!-- Tampilkan Soal Essay -->
                @foreach ($essaySoal as $key => $essay)
                    <div class="question-card">
                        <h5>Essay Question {{ $key + 1 }}:</h5>
                        <p>{{ $essay['question'] }}</p>
                        @if(!empty($essay['question_photo']))
                            <img style="text-align: center" src="{{ asset('storage/essay/' . $essay['cpmk_id'] . '/' .$essay['question_photo']) }}" alt="Gambar Soal">
                        @endif
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                @endforeach

                <div class="text-center">
                    <button class="btn btn-primary mt-4">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
                // Perform action when timer reaches zero (e.g., submit the exam)
            }
        }, 1000);
    }

    window.onload = function () {
        var twentyFiveMinutes = 60 * 75,
            display = document.querySelector('#timer');
        startTimer(twentyFiveMinutes, display);
    };
</script>
</body>
</html>

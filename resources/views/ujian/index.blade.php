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
                <form action="/ujian"  method="post" enctype="multipart/form-data">
                    @csrf
                <!-- Tampilkan Soal Objective -->
                @foreach ($objectiveSoal as $key => $objective)
                    <div class="question-card">
                        <input type="hidden" name="objective_ids{{ $key }}" value="{{ $objective['id'] }}">
                        <input type="hidden" name="cpmk_id{{ $key }}" value="{{ $objective['cpmk_id'] }}">
                        <h5>Objective Question {{ $key + 1 }}:</h5>
                        <h7>CPMK {{ $objective['cpmk_id'] }}</h7>
                        <h7>Objective_ids {{ $objective['id'] }}</h7>
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
                        <input type="hidden" name="essay_ids{{ $key }}" value="{{ $essay['id'] }}">
                        <input type="hidden" name="cpmk_id_essay{{ $key }}" value="{{ $essay['cpmk_id'] }}">
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
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menyimpan data form
    function saveFormData() {
        const formData = {};

        // Simpan data dari input radio
        const radioInputs = document.querySelectorAll('input[type="radio"]');
        radioInputs.forEach(input => {
            if (input.checked) {
                formData[input.name] = input.value;
            }
        });

        // Simpan data dari textarea
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach(textarea => {
            formData[textarea.id] = textarea.value;
        });

        // Simpan data di sessionStorage
        sessionStorage.setItem('formData', JSON.stringify(formData));
    }

    // Fungsi untuk mengisi data form dari sessionStorage
    function loadFormData() {
        const savedData = sessionStorage.getItem('formData');
        if (savedData) {
            const formData = JSON.parse(savedData);

            // Isi data radio
            const radioInputs = document.querySelectorAll('input[type="radio"]');
            radioInputs.forEach(input => {
                if (formData[input.name] === input.value) {
                    input.checked = true;
                }
            });

            // Isi data textarea
            const textareas = document.querySelectorAll('textarea');
            textareas.forEach(textarea => {
                if (formData[textarea.id]) {
                    textarea.value = formData[textarea.id];
                }
            });
        }
    }

    // Fungsi untuk mengirimkan data form ke server saat waktu habis
    function submitFormOnTimeout() {
        const formData = JSON.parse(sessionStorage.getItem('formData'));

        // Pastikan Anda menggantikan URL dan metode HTTP yang sesuai
        const url = 'url-untuk-menyimpan-data-form';
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

        xhr.onload = function () {
            if (xhr.status === 200) {
                // Data berhasil dikirim, Anda dapat melakukan tindakan lain di sini
                sessionStorage.removeItem('formData');
            }
        };

        xhr.send(JSON.stringify(formData));
    }

    // Gantilah angka 75 dengan jumlah detik yang sesuai dengan waktu ujian Anda
    var timeLeft = 75 * 60; // 75 menit

    // Fungsi untuk menghitung mundur waktu
    function startCountdown() {
        var display = document.querySelector('#timer');

        var timerInterval = setInterval(function () {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;
            var formattedTime = (minutes < 10 ? "0" : "") + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
            display.textContent = formattedTime;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                // Panggil fungsi submitFormOnTimeout untuk mengirimkan data secara otomatis
                submitFormOnTimeout();
            } else {
                timeLeft--;
            }
        }, 1000);
    }

    // Jalankan fungsi loadFormData saat halaman dimuat
    window.addEventListener('load', loadFormData);

    // Jalankan fungsi startCountdown saat halaman dimuat
    window.addEventListener('load', startCountdown);

    // Jalankan fungsi saveFormData saat form berubah
    document.addEventListener('change', saveFormData);
</script>
</body>
</html>

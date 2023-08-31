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
                    <h2 class="text-center mb-4">Ujian Sinyal dan Sistem</h2>
                    <p class="text-center">Timer: <span id="timer">75:00</span></p>

                    <div class="question-card">
                        <h5>Essay Question 1:</h5>
                        <p>1. Jelaskan perbedaan antara sinyal analog dan sinyal digital. Bagaimana proses konversi antara keduanya dapat dilakukan? Berikan contoh konkretnya.</p>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>

                    <div class="question-card">
                        <h5>Essay Question 2:</h5>
                        <p>2. Sistem LTI (Linear Time-Invariant) memiliki peran penting dalam pengolahan sinyal. Jelaskan apa arti dari sifat linear dan invarian terhadap waktu dalam konteks sistem ini. Berikan contoh sistem yang memenuhi kedua sifat tersebut dan jelaskan mengapa sifat-sifat ini penting.</p>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>

                    <div class="question-card">
                        <h5>Essay Question 3:</h5>
                        <p>3. Sinyal acak memiliki karakteristik yang berbeda dibandingkan dengan sinyal deterministik. Jelaskan apa yang dimaksud dengan sinyal acak dan berikan contoh penggunaannya dalam kehidupan sehari-hari atau dalam bidang tertentu seperti telekomunikasi atau keuangan.</p>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>

                    <div class="question-card">
                        <h5>Essay Question 4:</h5>
                        <p>4. Dalam konteks pengolahan sinyal, apa itu konvolusi? Bagaimana konsep konvolusi digunakan dalam mengolah sinyal? Berikan contoh penerapannya dalam pengolahan gambar atau audio.</p>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>

                    <div class="question-card">
                        <h5>Essay Question 5:</h5>
                        <p>5. Teorema Nyquist-Shannon merupakan konsep penting dalam digitalisasi sinyal analog menjadi sinyal digital. Jelaskan apa yang dimaksud dengan teorema ini dan mengapa sampling pada frekuensi yang tepat diperlukan. Bagaimana pelanggaran terhadap Teorema Nyquist-Shannon dapat menyebabkan masalah pada sinyal yang direkonstruksi?</p>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>

                    <h5 class="text-center mt-4">Objective Questions:</h5>
                    <div class="question-card">
                        <h6>1. Apa perbedaan utama antara sinyal analog dan sinyal digital?</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective1" id="objective1a" value="a">
                            <label class="form-check-label" for="objective1a">A) Sinyal analog adalah kontinu, sementara sinyal digital diskrit.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective1" id="objective1b" value="b">
                            <label class="form-check-label" for="objective1b">B) Sinyal analog hanya memiliki dua nilai, sementara sinyal digital memiliki banyak nilai.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective1" id="objective1c" value="c">
                            <label class="form-check-label" for="objective1c">C) Sinyal analog lebih tahan terhadap gangguan dibandingkan sinyal digital.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective1" id="objective1d" value="d">
                            <label class="form-check-label" for="objective1d">D) Sinyal analog hanya digunakan dalam telepon, sementara sinyal digital digunakan dalam komputer.</label>
                        </div>
                    </div>

                    <div class="question-card">
                        <h6>2. Sifat apa yang didefinisikan oleh sistem LTI (Linear Time-Invariant)?</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective2" id="objective2a" value="a">
                            <label class="form-check-label" for="objective2a">A) Sistem yang berfungsi pada waktu tertentu saja.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective2" id="objective2b" value="b">
                            <label class="form-check-label" for="objective2b">B) Sistem yang outputnya berbanding lurus dengan inputnya dan tidak berubah seiring waktu.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective2" id="objective2c" value="c">
                            <label class="form-check-label" for="objective2c">C) Sistem yang hanya bekerja pada sinyal digital.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective2" id="objective2d" value="d">
                            <label class="form-check-label" for="objective2d">D) Sistem yang outputnya berubah secara acak seiring waktu.</label>
                        </div>
                    </div>

                    <div class="question-card">
                        <h6>3. Apa yang dimaksud dengan konvolusi dalam konteks pengolahan sinyal?</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective3" id="objective3a" value="a">
                            <label class="form-check-label" for="objective3a">A) Proses mengubah sinyal analog menjadi sinyal digital.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective3" id="objective3b" value="b">
                            <label class="form-check-label" for="objective3b">B) Proses menggabungkan dua sinyal menjadi satu sinyal.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective3" id="objective3c" value="c">
                            <label class="form-check-label" for="objective3c">C) Proses mengubah sinyal diskrit menjadi sinyal kontinu.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objective3" id="objective3d" value="d">
                            <label class="form-check-label" for="objective3d">D) Proses menghitung integral dari sinyal.</label>
                        </div>
                    </div>

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah CPMK</title>
  <!-- Tambahkan link Bootstrap CSS di sini -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(to right, #007bff, #e2dcdb);
    }
    .card {
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah CPMK</h4>
            <form>
              <div class="form-group">
                <label for="nama">CPMK (Nomor)</label>
                <input type="text" class="form-control" id="cpmk" name="nama">
              </div>
              <div class="form-group">
                <label for="nama">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>
              <div class="mb-3">
                <label class="form-label">Remedial</label>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="keterangan_ya" name="keterangan" value="ya">
                  <label class="form-check-label" for="keterangan_ya">Ya</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="keterangan_tidak" name="keterangan" value="tidak">
                  <label class="form-check-label" for="keterangan_tidak">Tidak</label>
                </div>
                <br>

              {{-- <div id="kolom-dinamis">
                <!-- Kolom pertama (default) -->
                <div class="form-group" id="kolom1-div">
                  <label for="kolom1">CPMK 1</label>
                  <input type="text" class="form-control" id="kolom1" name="kolom1">
                </div>
              </div> --}}

              {{-- <button type="button" class="btn btn-primary" onclick="tambahKolom()">Tambah Kolom</button>
              <button type="button" class="btn btn-danger" onclick="hapusKolom()">Hapus Kolom</button> --}}

              <button type="submit" class="btn btn-success mt-1">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambahkan skrip JavaScript di sini -->
  <script>
    let kolomCounter = 1;

    function tambahKolom() {
      kolomCounter++;
      const kolomHTML = `
        <div class="form-group" id="CPMK${kolomCounter}-div">
          <label for="CPMK${kolomCounter}">CPMK ${kolomCounter}</label>
          <input type="text" class="form-control" id="CPMK${kolomCounter}" name="CPMK${kolomCounter}">
        </div>
      `;
      document.getElementById("kolom-dinamis").insertAdjacentHTML("beforeend", kolomHTML);
    }

    function hapusKolom() {
      if (kolomCounter > 1) {
        const kolomDiv = document.getElementById(`CPMK${kolomCounter}-div`);
        kolomDiv.parentNode.removeChild(kolomDiv);
        kolomCounter--;
      }
    }
  </script>
</body>
</html>

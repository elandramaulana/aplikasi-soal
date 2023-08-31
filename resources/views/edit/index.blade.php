<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mata Kuliah</title>
  <!-- Tambahkan link Bootstrap CSS di sini -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(to right, #007bff, #cfc9c8);
    }
    .card {
      margin-top: 50px;
      margin-bottom: 50px
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Detail Mata Kuliah</h4>
            <form>
              <div class="form-group">
                <label for="kode">Nama Mata Kuliah</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" value="Sinyal Dan Sistem" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">Kode Mata Kuliah</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" value="MK101" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">Jumlah SKS</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" value="2" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">Semester</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" value="5" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">Dosen Pengampu</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" value="Ir. Eng Budi Rahmadya" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">CPMK 1</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" value="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut, aliquam." >
                  {{-- <div class="input-group-append">
                    <a href="{{ route('edit') }}" class="btn btn-outline-primary" type="button" onclick="editField('kode')">Edit</a>
                  </div> --}}
                </div>
              </div>
              <div class="form-group">
                <label for="kode">CPMK 2</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" value="Lorem ipsum dolor sit amet consectetur, adipisicing elit." >
                  {{-- <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" onclick="editField('kode')">Edit</button>
                  </div> --}}
                </div>
              </div>
              <!-- Sisipkan elemen form-group dan input lain dengan struktur serupa -->
              <button type="submit" class="btn btn-success">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambahkan skrip JavaScript di sini -->
  <script>
    function editField(fieldId) {
      const field = document.getElementById(fieldId);
      field.removeAttribute('disabled');
      const editButton = field.parentNode.querySelector('button');
      editButton.setAttribute('disabled', true);
    }
  </script>
</body>
</html>

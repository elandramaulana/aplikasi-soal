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
              @foreach($matkul as $m)
            <form method="post" action="/matkul-edit">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $m->id }}">
              <div class="form-group">
                  <label for="nama_matkul">Nama Mata Kuliah</label>
                  <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="{{ $m->nama_matkul }}" >
              </div>
              <div class="form-group">
                <label for="kode">Kode Mata Kuliah</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" name="kode_matkul" value="{{ $m->kode_matkul }}" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">Jumlah SKS</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="kode" name="sks" value="{{ $m->sks }}" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">Semester</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="kode" name="semester" value="{{ $m->semester }}" >
                </div>
              </div>
              <div class="form-group">
                <label for="kode">Dosen Pengampu</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kode" name="dosen" value="{{ $m->dosen }}" >
                </div>
              </div>
              <!-- Sisipkan elemen form-group dan input lain dengan struktur serupa -->
              <button type="submit" class="btn btn-success">Update</button>
            </form>
              @endforeach
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Lamaran Pekerjaan - Job Gosam</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    .card-body {
      background-color:#2F4F4F;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h5 class="card-header font-weight-bold">Form Lamaran Pekerjaan - Job Gosam</h5>
      <div class="card-body">
        <form id="job-application-form" action="../user_lamaran/proses_lamaran.php" method="POST">
          <div class="mb-3">
            <label for="full-name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="full-name" name="nama-lengkap" required>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="alamat" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input type="tel" class="form-control" id="phone" name="telepon" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Posisi yang Dilamar</label>
            <select class="form-control" id="position" name="posisi" required>
              <option value="">---------------</option>
              <option value="position1">Pengangkut Sampah</option>
              <option value="position2">Jangan berharap lebih</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="experience" class="form-label">Pengalaman Kerja</label>
            <textarea class="form-control" id="experience" name="pengalaman" rows="5" required></textarea>
          </div>
          <div class="mb-3">
            <label for="education" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="education" name="pendidikan" required>
          </div>
          <div class="mb-3">
            <label for="motivation" class="form-label">Motivasi Anda</label>
            <textarea class="form-control" id="motivation" name="motivasi" rows="5" required></textarea>
          </div>
          <div class="mb-3">
            <label for="skills" class="form-label">Keterampilan</label>
            <input type="text" class="form-control" id="skills" name="keterampilan" required>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

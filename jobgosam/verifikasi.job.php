<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Verifikasi - Job Gosam</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    .card-body {
      background-color: #2c3e50;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h5 class="card-header font-weight-bold">Form Verifikasi - Job Gosam</h5>
      <div class="card-body">
        <form id="verification-form" action="proses_verifikasi.php" method="POST">
          <div class="mb-3">
            <label for="applicant-name" class="form-label">Nama Pelamar</label>
            <input type="text" class="form-control" id="applicant-name" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="applicant-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="applicant-email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="position-applied" class="form-label">Posisi yang Dilamar</label>
            <input type="text" class="form-control" id="position-applied" name="posisi" required>
          </div>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      // Handler saat formulir dikirim
      $('#verification-form').submit(function(e) {
        e.preventDefault();

        // Mengambil nilai-nilai input
        var applicantName = $('#applicant-name').val();
        var applicantEmail = $('#applicant-email').val();
        var positionApplied = $('#position-applied').val();

        // Menggabungkan data ke dalam URL WhatsApp
        var whatsappURL = 'https://api.whatsapp.com/send?phone=6283817217496&text=' +
          encodeURIComponent('Nama Pelamar: ' + applicantName + '\n' +
            'Email: ' + applicantEmail + '\n' +
            'Posisi yang Dilamar: ' + positionApplied);

        // Mengarahkan pengguna ke WhatsApp
        window.location.href = whatsappURL;
      });
    });
  </script>
</body>
</html>

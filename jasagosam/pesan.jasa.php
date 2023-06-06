<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>
<body>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <!-- info pesanan -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Informasi Formulir Pemesanan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
            <p>Silakan mengisi formulir pemesanan di sebelah kanan untuk memesan jasa kami.</p>
            <p>Setelah mengisi formulir, Anda dapat memilih salah satu metode pembayaran berikut:</p>
              <ul>
                <li>Pembayaran tunai saat layanan diberikan.</li>
                <li>Pembayaran melalui transfer ke akun Dana. Silakan klik tombol di bawah ini:</li>
                <button type="button" class="btn btn-primary" onclick="redirectToDana()">Bayar melalui Dana</button>
                <script>
                  function redirectToDana() {
                    var danaURL = 'https://link.dana.id/qr/d7ukd4w1';
                    window.location.href = danaURL;
                  }
                </script>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-7">
          <div class="card">
            <div>
              <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                  <div class="input-group-append">
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Formulir pemesanan -->
            <div class="card-body">
              <form id="order-form" target="_blank">
                <div class="mb-3">
                  <label for="full-name" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="full-name" name="full-name" required>
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Nomor Telepon</label>
                  <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="order-date" class="form-label">Tanggal Pesanan</label>
                  <input type="date" class="form-control" id="order-date" name="order-date" required>
                </div>
                <div class="mb-3">
                  <label for="order-time" class="form-label">Waktu Pemesanan</label>
                  <input type="time" class="form-control" id="order-time" name="order-time" required>
                </div>
                <div class="mb-3">
                  <label for="team" class="form-label">Memilih Nama Team</label>
                  <select class="form-control" id="team" name="team" required>
                    <option value="">---------------</option>
                    <option value="team1">Pandawara</option>
                    <option value="team2">OK Clean</option>
                    <option value="team3">Sampaholics</option>
                    <option value="team3">Tukang Sampah-ngatap</option>
                    <option value="team3">Sampah-sempahers</option>
                    <option value="team3">Sedang Ready...</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="notes" class="form-label">Catatan</label>
                  <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- FullCalendar JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/fullcalendar.min.js"></script>

  <script>
    $(document).ready(function() {
      // Handler saat formulir dikirim
      $('#order-form').submit(function(e) {
        e.preventDefault();

        // Mengambil nilai-nilai input
        var fullName = $('#full-name').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var orderDate = $('#order-date').val();
        var orderTime = $('#order-time').val();
        var team = $('#team').val();
        var notes = $('#notes').val();

        // Menggabungkan data ke dalam URL WhatsApp
        var whatsappURL = 'https://api.whatsapp.com/send?phone=6283817217496&text=' +
          encodeURIComponent('Nama Lengkap: ' + fullName + '\n' +
            'Alamat: ' + address + '\n' +
            'Nomor Telepon: ' + phone + '\n' +
            'Email: ' + email + '\n' +
            'Tanggal Pesanan: ' + orderDate + '\n' +
            'Waktu Pemesanan: ' + orderTime + '\n' +
            'Tim: ' + team + '\n' +
            'Catatan: ' + notes);

        // Mengarahkan pengguna ke WhatsApp
        window.location.href = whatsappURL;
      });
    });
  </script>
</body>
</html>

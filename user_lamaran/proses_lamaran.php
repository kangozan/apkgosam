<?php
// Mengambil nilai input dari form
$namaLengkap = isset($_POST['nama-lengkap']) ? $_POST['nama-lengkap'] : '';
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
$telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$posisi = isset($_POST['posisi']) ? $_POST['posisi'] : '';
$pengalaman = isset($_POST['pengalaman']) ? $_POST['pengalaman'] : '';
$pendidikan = isset($_POST['pendidikan']) ? $_POST['pendidikan'] : '';
$motivasi = isset($_POST['motivasi']) ? $_POST['motivasi'] : '';
$tanggalLamaran = date('Y-m-d H:i:s');

// Menyiapkan koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$user = 'root'; // Ganti dengan nama pengguna database Anda
$password = ''; // Ganti dengan kata sandi database Anda
$database = 'apk_gosam'; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi ke database
if (!$koneksi) {
  die('Koneksi database gagal: ' . mysqli_connect_error());
}

// Menyiapkan query untuk menyimpan data lamaran ke database
$query = "INSERT INTO job (nama_lengkap, alamat, telepon, email, posisi, pengalaman, pendidikan, motivasi, tanggal_lamaran)
          VALUES ('$namaLengkap', '$alamat', '$telepon', '$email', '$posisi', '$pengalaman', '$pendidikan', '$motivasi', '$tanggalLamaran')";

// Menjalankan query
if (mysqli_query($koneksi, $query)) {
  // Menutup koneksi ke database
  mysqli_close($koneksi);

  // Menampilkan pesan alert bahwa lamaran sudah terkirim
  echo "<script>alert('Lamaran sudah terkirim. Terima kasih atas lamaran Anda!');</script>";
  echo "<script>window.location.href = '../jobgosam/job.index.php';</script>";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>

<?php

//code ini adalah masukan dari user untuk gosam terhubung ke database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $masukan = $_POST["masukan"];

        // Memanggil fungsi kirimmasukan untuk memproses masukan
        kirimmasukan($nama, $email, $masukan);
    }
}

function kirimmasukan($nama, $email, $masukan)
{
    // Menghubungkan ke database
    $koneksi = mysqli_connect("localhost", "root", "", "apk_gosam");

    // Mengecek koneksi ke database
    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    }

    // Melakukan operasi SQL untuk menyimpan masukan ke dalam database
    $sql = "INSERT INTO `usermasukan` (nama, email, masukan) VALUES ('$nama', '$email', '$masukan')";

    if (mysqli_query($koneksi, $sql)) {
        // Menutup koneksi ke database
        mysqli_close($koneksi);

        echo "<script>alert('Masukan berhasil dikirim');</script>";
        echo "<script>window.location.href = '../index.php';</script>";
        exit; // Penting untuk menghentikan eksekusi script setelah melakukan redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi ke database
    mysqli_close($koneksi);
}


?>
<?php
require '../database/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .table-centered {
            margin-left: auto;
            margin-right: auto;
        }

        .text-centered {
            text-align: center;
        }

        .no-column {
            width: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 class="text-center" style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1.5rem; text-transform: uppercase; color: #333;">Daftar Team GOSAM</h2>
        <table class="table table-bordered table-centered">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-centered no-column">No</th>
                    <th scope="col" class="text-centered">Nama Team</th>
                    <th scope="col" class="text-centered">Harga Angkut</th>
                    <th scope="col" class="text-centered">Tautan Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inisialisasi nomor urut
                $nomor = 1;

                // Periksa apakah query berhasil
                if (mysqli_num_rows($result) > 0) {
                    // Tampilkan data ke dalam tabel
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td class="text-centered">' . $nomor . '</td>';
                        echo '<td>' . $row['nama_team'] . '</td>';
                        echo '<td>' . $row['harga'] . '</td>';
                        echo '<td class="text-centered"><a href="jasa.index.php?page=pesan' . '" class="btn btn-primary">Pesan</a></td>';
                        echo '</tr>';

                        // Increment nomor urut
                        $nomor++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>

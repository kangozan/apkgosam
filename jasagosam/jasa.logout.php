

<?php
session_start();

// Menghapus semua data session
session_destroy();

// Mengarahkan pengguna ke halaman landing page
header("location: ../index.php");
exit;
?>
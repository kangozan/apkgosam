<?php


//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "apk_gosam");

//registrasi jasa gosam
function registrasi($add){
    global $conn;

    $username = strtolower(stripslashes($add["username"]));
    $password = mysqli_real_escape_string( $conn, $add["password"]);
    $password2 = mysqli_real_escape_string($conn, $add["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM userjasa WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "
        <script>
            alert('username  sudah terdaftar!')
        </script>
        ";
        
        return false;
    }

    if( $password !== $password2){
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!')
            </script>
            ";
        return false;
    } 

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO userjasa VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}



//registrasi job gosam
function registrasijob($add){
    global $conn;

    $username = strtolower(stripslashes($add["username"]));
    $password = mysqli_real_escape_string( $conn, $add["password"]);
    $password2 = mysqli_real_escape_string($conn, $add["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM userjob WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "
        <script>
            alert('username  sudah terdaftar!')
        </script>
        ";
        
        return false;
    }

    if( $password !== $password2){
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!')
            </script>
            ";
        return false;
    } 

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO userjob VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}


 // mengambil data dari database untuk ke layanan jasa
$sql = "SELECT * FROM layanan_jasa";
$result = mysqli_query($conn, $sql);


?>
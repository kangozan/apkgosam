<?php

session_start();

// Memanggil file database
require '../database/functions.php';

// User jasa registrasi
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('User baru berhasil ditambahkan!')
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

// Ketika user sudah login, maka secara otomatis ke halaman index jasa 
if (isset($_SESSION["login"])) {
    header("location: jasa.index.php"); 
    exit;
}

// User jasa login ke halaman index
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM userjasa WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            if (isset($_POST["remember"])) {
                // Jika opsi "Remember Me" dipilih, atur cookie dengan password yang tersamarkan
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                setcookie($username, $hashedPassword, time() + (86400 * 30), "/");
            } else {
                // Jika opsi "Remember Me" tidak dipilih, hapus cookie
                setcookie($username, "", time() - (60 * 30), "/");
            }

            $_SESSION["login"] = true; // Set session "login" ke true
            header("location: jasa.index.php");
            exit;
        }
    }
    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Jasa Gosam</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- css native login jasa -->
  <link rel="stylesheet" href="jasa.style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-header"> 
	<div class="section"> 
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Jasa GOSAM</h4>
											<form action="" method="POST">
												<div class="form-group">
													<input type="text" name="username" class="form-style" placeholder="Username" id="username" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style" placeholder="Password" id="password" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<div class="checkbox-container">
													<input type="checkbox" name="remember"  id="checkbox1" class="custom-checkbox-input">
													<label for="checkbox1" class="custom-checkbox-label"></label>
													<span class="custom-checkbox-text">Remember me</span>
												</div>
												<button class="btn mt-4" type="submit" name="login">submit</button>
											</form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Jasa GOSAM</h4>
											<form action="" method="post">
												<div class="form-group">
													<input type="text" name="username" class="form-style" placeholder="Username" id="usernmae" autocomplete="off">
													<i class="input-icon uil uil-user"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style" placeholder="Password" id="password" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="password2" class="form-style" placeholder="Konfirmasi Password" id="password2" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button class="btn mt-4" type="submit" name="register">submit</button>
											</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</div>
</div>
            
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>

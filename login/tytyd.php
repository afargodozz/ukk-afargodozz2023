<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Masyarakat</title>
	<style>
		body{

margin: 0;

padding: 0;

font-family: sans-serif;

background: url(img/onepiece.jpg); 

background-repeat: no-repeat;

background-size: cover;

}

.box{

width: 300px;

padding: 40px;

position: absolute;

top: 50%;

left: 50%;

transform: translate(-50%,-50%);

background: #191919;

text-align: center;

}

.box h1{

color: white;

text-transform: uppercase;

font-weight: 500;

}

.box input[type = "text"], .box input[type = "password"]{

border: 0;

background: none;

display: block;

margin: 20px auto;

text-align: center;

border: 2px solid #3498db;

padding: 14px 10px;

width: 200px;

outline: none;

color: white;

border-radius: 24px;

transition: 0.25s;

}

.box input[type = "text"]:focus,.box input[type = "password"]:focus{

width: 280px;

border-color: #2ecc71;

}



.box input[type = "submit"]

{

 border: 0;

background: none;

display: block;

margin: 20px auto;

text-align: center;

border: 2px solid #2ecc71;

padding: 14px 40px;

outline: none;

color: white;

border-radius: 24px;

transition: 0.25s;

cursor: pointer;

}



.box input[type = "submit"]:hover

{

background: #2ecc71;

}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
					SILAHKAN LOGIN
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="user" required="required" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" required="required" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						
					</div>

					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							<i class="fa fa-sign-in"></i> Login
						</button>
                         <?php
if (isset($_POST ['login'])) {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$data_user = mysqli_query ($conn,"SELECT * FROM masyarakat WHERE username ='$user' AND password ='$pass'");
				$r = mysqli_fetch_array ($data_user);
				$username = $r ['username'];
				$password = $r ['password'];
				$nama_user = $r ['nama'];
				$nik = $r ['nik'];
				$tlp = $r ['tlp'];
				if ($user == $username && $pass == $password) {
					$_SESSION['nama'] = $nama_user;
					$_SESSION['nik'] = $nik;
					$_SESSION['tlp'] = $tlp;
		echo "<div class='alert alert-success'>Login Sukses</div>";
		echo "<meta http-equiv='refresh' content='1;url=masarakat_admin.php'>";
		} else {
		echo "<div class='alert alert-danger'>Login Gagal</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php'>";

	}
	}
?>
					</div>
                    <br/>
                    <center>Belum Punya Acount? Registrasi <a href="../registrasi.php" class="txt3">disini</a></center>
                    <br>

					<div>

						<center><a href="../index.php" class="txt3">
							Kembali
						</a></center>
					</div>
                   
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>
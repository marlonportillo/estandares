<?php
if (isset($_SESSION['id'])) :
	if ($_SESSION['level'] == 1) {
		# code...
		header("Location: mainsuper.php?module=index");
	} elseif ($_SESSION['level'] == 2) {
		# code...
		header("Location: mainadmin.php?module=index");
	} elseif ($_SESSION['level'] == 3) {
		# code...
		header("Location: mainoperador.php?module=index");
	} else {
		header("Location:login.php");
	}
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistema de presupuestos - Login</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="" style="background: url(img/back.jpg);">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-6 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">

							<div class="col-lg-12">
								<?php
								if (isset($_GET['msg'])) {
									echo "<div class='alert alert-danger'>Credenciales incorrectas.</div>";
								}
								?>
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
									</div>
									<form class="user" method="POST" action="procesar.php">
										<div class="form-group">
											<input type="text" name="nombre" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario" required>
										</div>
										<div class="form-group">
											<input type="password" name="clave" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" required>
										</div>

										<input type="submit" class="btn btn-primary btn-user btn-block" value="Login">

									</form>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="js/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
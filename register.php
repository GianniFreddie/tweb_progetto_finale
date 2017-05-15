<?
	//includo utility dove c'e funzione che registra nuovo user
	include 'queries.php'
	include 'utilities.php';
	$there_are_parameters = !empty($_REQUEST['nickname']) && !empty($_REQUEST['email']) && !empty($_REQUEST['psw']);
	$result = NULL;
	if($there_are_parameters == true) {
		$result = register_new_user($_REQUEST['nickname'], $_REQUEST['email'], $_REQUEST['psw']);
		if($result == "ok"){
			//redirect
			header('Location: http://localhost:3005/tweb_progetto_finale/feeds.php');
		}
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name = "author" content = "Testa Giovanni MATR:777810" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/css/home.css" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/css/forms.css" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/bootstrap/css/bootstrap.css" />
	</head>
  <body>
		<?= ($result != NULL ? $result : '') ?>
		<div class="content-wrapper">
			<div class="container">
				<div class="card register-card">
					<div class="card-block">
						<h2 class = "card-title text-center">Register</h2>
						<form action = "/tweb_progetto_finale/register.php" method="post">
							<div class="form-group">
								<input type = "text" class = "form-control" name = "nickname" placeholder="Nickname"> <?php // TODO: controllo nickname in ajax ?>
							</div>
							<div class="form-group">
								<input type = "email" class = "form-control" name = "email" placeholder="Email">
							</div>

							<div class="form-group">
								<input type = "password" class = "form-control" name = "psw" placeholder="Password">
							</div>
							<div class="form-group">
								<input type = "password" class = "form-control" name = "psw_confirm" placeholder="Confirm password">
							</div>
							<div class="row">
								<div class="col-md-2">
									<input type="submit" class = "btn orange-button" value = "Register">
								</div>
								<div class="col-md-2 col-md-offset-8 action-link-container">
									<a href = "/tweb_progetto_finale/login.php" class = "action-link btn orange-button">Log in</a>
								</div>
							</div>

				    </form>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<span>
				contact us
			</span>
			<span>
				boh
			</span>
		</footer>


		<script src="/tweb_progetto_finale/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/tweb_progetto_finale/bootstrap/js/bootstrap.js"></script>
  </body>
</html>

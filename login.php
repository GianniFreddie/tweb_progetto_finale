<?
	//includo il file che contiene la funzione di login
	include 'utilities.php';
	//variabile che conterrà eventuali errori dei dati del form
	$form_error = NULL;
	//controllo se sono stati mandati dei parametri nella user_research_result
	if(!empty($_REQUEST["email"]) && !empty($_REQUEST["psw"])){
		$result = authenticate_user($_REQUEST["email"], $_REQUEST["psw"]);
		if($result == "ok"){
			//redirect
			header('Location: http://localhost:3005/tweb_progetto_finale/feeds.php');
		}else{
			$form_error = $result;
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
		<div class = "content-wrapper">
			<div class = "container">
				<div class = "card">
					<div class = "card-block">
						<h2 class = "card-title text-center"> Log in</h2>
						<form action = "/tweb_progetto_finale/login.php" method="post">
							<? if($form_error && $form_error == "Email not found") { ?>
								<div class="form-group has-error has-feedback">
									<input type = "email" name = "email" class = "form-control" value = "<?= $_REQUEST['email'] ?>"/>
									<!-- <div class="form-control-feedback">The given email can't be find</div> -->
								</div>
							<? }else{ ?>
								<div class="form-group">
									<!-- mette nella input valore email mandato come parametro se esiste -->
									<input type = "email" name = "email" class = "form-control" placeholder="Email" value = "<?= (!empty($_REQUEST['email']) ? $_REQUEST['email'] : '') ?>"/>
								</div>
							<? } ?>
							<? if($form_error && $form_error == "The password is wrong"){ ?>
								<div class="form-group has-error has-feedback">
									<input type = "password" name = "psw" class = "form-control" />
								</div>
							<? }else{ ?>
								<div class="form-group">
									<input type = "password" name = "psw" class = "form-control" placeholder="Password">
								</div>
							<? } ?>

							<div class="row">
								<div class="col-md-2">
									<input type="submit" class = "btn orange-button" value = "Login">
								</div>
								<div class="col-md-2 col-md-offset-8 action-link-container">
									<a href = "/tweb_progetto_finale/register.php" class = "btn orange-button">Register</a>
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

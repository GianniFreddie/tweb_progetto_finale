<?
	session_start();
	$print = var_dump($_SESSION["current_user_id"]);
	if(isset($_SESSION["current_user_id"])){
		//redirect
		header('Location: http://localhost:3005/tweb_progetto_finale/feeds.php');
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name = "author" content = "Testa Giovanni MATR:777810" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/bootstrap/css/bootstrap.css" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/css/home.css" />
	</head>
	<body>
		<?= $print ?>
		<div class = "content-wrapper">
			<div class = "container">
				<div class = "logo">
					<img src = "/tweb_progetto_finale/images/site-icon.png" />
					<h1> Nerd organizer </h1>
				</div>
				<div class = "row">
					<div class = "col-md-4 col-md-offset-4 text-center">
						<p>
							Nerd's life is hard. Keeping track of your favourite tv series new episodes.
							New games for every console. But now there is the solution.
						</p>
					</div>
				</div>
				<div class = "navigation-links row">
					<div class = "col-md-2 col-md-offset-4 text-center">
						<a href = "/tweb_progetto_finale/login.php">Log in</a>
					</div>
					<div class = "col-md-2 text-center">
						<a href = "/tweb_progetto_finale/register.php">Register</a>
					</div>
				</div> <!-- fine navigations-links -->
			</div> <!-- container -->
		</div> <!-- content wrapper -->
		<div class = "row details">
			<div class = "col-md-4">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
			</div>
			<div class = "col-md-4">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
			</div>
			<div class = "col-md-4">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
			</div>
		</div>
		<div class = "other-things row">
			<div class = "col-md-6 col-md-offset-3 text-center">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
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

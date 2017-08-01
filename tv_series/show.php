<?
  session_start();
  include '../queries.php';
  include 'tv_series_controller.php';
  include '../utilities.php';
  $tv_series = series_index();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name = "author" content = "Testa Giovanni MATR:777810" />
    <link rel = "stylesheet" href = "/tweb_progetto_finale/css/feeds.css" />
    <link rel = "stylesheet" href = "/tweb_progetto_finale/css/tv_series.css" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/bootstrap/css/bootstrap.css" />
  </head>
  <body>
    <? require '../navbar.html' ?>
  </body>
</html>
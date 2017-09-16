<?
  session_start();
  include '../queries.php';
  include 'tv_series_controller.php';
  include '../utilities.php';
  // se il parametro relativo all'id della serie tv da visualizzare è stato passato correttamente
  // recupera da db la serie tv
  if(!empty($_REQUEST['id'])) {
    //prende il PDOStatement della serie tv con id passato come parametro
    $get_response = get_tv_serie($_REQUEST['id']);
    //fetch, tanto l'id è univoco sarà al massimo uno
    $telefilm = $get_response->fetch();
  }  
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
    <div class='parallax-cover' style='background-image: url(<?= $telefilm['cover_image'] ?>);'>
    </div>
    <div class = "container">
      <div class="text-center ">
        <p><?= $telefilm["description"] ?></p>
        <h2>Plot</h2>
        <p><?= $telefilm["plot"] ?></p>
      </div>
    </div>
  </body>
</html>
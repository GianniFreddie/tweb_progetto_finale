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
    <div id="did_watch_droppable">
    </div>
    <div id="watching_droppable">
    </div>
    <div id="wish_to_watch">
    </div>
    </div>
    <div class="container">
      <? require '../sidebar_info.php' ?>
      <div class="main-content">
        <? if($tv_series && $tv_series->rowCount() > 0){ ?>
          <? $count = 0 ?>
          <? foreach($tv_series as $telefilm){ ?>
            <div class = "telefilm-info" id="telefilm_<?=$count?>" data-tv-serie-id = "<?= $telefilm["id"]?>" data-current-user-id = "<?= $_SESSION["current_user_id"] ?>">
              <h3><?= $telefilm["title"] ?></h3>
              <img src="<?= $telefilm['cover_image'] ?>" alt="Gotham cover image">
              <p>Numero di stagioni: <?= number_of_seasons($telefilm["id"]) ?></p>
              <p>Numero di episodi: <?= number_of_episodes($telefilm["id"]) ?></p>
            </div>
            <? $count++ ?>
          <? } ?>
        <? }else{ ?>
          Ooops there are no telefilms
        <? } ?>
      </div>
    </div>
    <script src="/tweb_progetto_finale/js/jquery.min.js"></script>
    <script src="/tweb_progetto_finale/bootstrap/js/bootstrap.js"></script>
    <script src="/tweb_progetto_finale/scriptaculous/lib/prototype.js"></script>
    <script src="/tweb_progetto_finale/scriptaculous/src/scriptaculous.js"></script>
    <script src="/tweb_progetto_finale/js/serie_tv_drag.js"></script>
  </body>
</html>

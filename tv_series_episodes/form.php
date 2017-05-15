<?
  session_start();
  include '../queries.php';
  include '../tv_series_seasons/tv_series_seasons_controller.php';
  include 'episodes_controller.php';
  //se i param non sono vuoti salva la puntata
  if(!empty($_REQUEST["season_id"]) && !empty($_REQUEST["title"]) && !empty($_REQUEST["duration"]) && !empty($_REQUEST["episode_order"])){
    insert_episode($_REQUEST["season_id"], $_REQUEST["title"], $_REQUEST["duration"], $_REQUEST["episode_order"]);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name = "author" content = "Testa Giovanni MATR:777810" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/bootstrap/css/bootstrap.css" />
  </head>
  <body>
    <form action = "/tweb_progetto_finale/tv_series_episodes/form.php" method = "post">
      <div class="form-group">
        <select name="season_id">
          <option value = "">Seleziona la stagione a cui appartiene la puntata</option>
          <!-- prendo tutte le stagioni in join con la serie a cui appartengono  -->
          <?
            $seasons = seasons_series_join();
            foreach($seasons as $season_serie) {
          ?>
            <option value = "<?= $season_serie["season_id"] ?>"> <?= $season_serie["season_title"] ?> - <?= $season_serie["title"] ?> </option>
          <? } ?>

        </select>
      </div>
      <div class="form-group">
        <label for="title">Episode title</label>
        <input type="text" name="title" class = "form-control" placeholder="Episode title">
      </div>
      <div class="form-group">
        <label for="duration">Duration</label>
        <input type="number" name="duration" class = "form-control"> minutes
      </div>
      <div class="form-group">
        <label for="order">Episode order</label>
        <input type="number" name="episode_order" class = "form-control">
      </div>

      <div class="form-group">
        <input type="submit" value="Insert episode" />
      </div>
    </form>
  </body>
</html>

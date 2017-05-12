<?
  session_start();
  include '../queries.php';
  include '../tv_series/tv_series_controller.php';
  include 'tv_series_seasons_controller.php';
  //se presenti nei parametri salvo dati
  if(!empty($_REQUEST["serie_id"]) && !empty($_REQUEST["title"])){
    create_new_season($_REQUEST["serie_id"], $_REQUEST["title"]);
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
    <form action="/tweb_progetto_finale/tv_series_seasons/form.php" method="post">
      <!-- Prendo tutte le serie tv inserite -->
      <?
        $series = series_index();
      ?>
      <div class="form-group">
        <select name = "serie_id">
          <option value = ""> Seleziona la serie tv di appartenenza </option>
          <!-- Le metto come opzioni select -->
          <? foreach ($series as $serie) { ?>
            <option value="<?= $serie['id'] ?>"> <?= $serie["title"] ?></option>
          <? } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="Title">Titolo</label>
        <input type="text" name="title" value="" />
      </div>
      <div class="form-group">
        <input type="submit" value="Inserisci" />
      </div>
    </form>
  </body>
</html>

<?
  session_start();
  include '../queries.php';
  include '../tv_series_seasons/tv_series_seasons_controller.php';
  include '../tv_series_episodes/tv_series_episodes_controller.php';
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
    <form action = "/tweb_progetto_finale/tv_series_edpisodes/form.php" method = "post">
      <div class="form-group">
        <select name="season_id">
          <option value = "">Seleziona la stagione a cui appartiene la puntata</option>

        </select>
      </div>
    </form>
  </body>
</html>

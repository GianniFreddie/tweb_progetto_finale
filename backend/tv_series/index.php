<?
  include '../../queries.php';
  include '../../tv_series/tv_series_controller.php';
  include '../../utilities.php';
  session_start();
  $tv_series = series_index();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name = "author" content = "Testa Giovanni MATR:777810" />
    <link rel = "stylesheet" href = "/tweb_progetto_finale/bootstrap/css/bootstrap.css" />
    <link rel = "stylesheet" href = "/tweb_progetto_finale/css/backend/sidebar.css" />
    <link rel = "stylesheet" href = "/tweb_progetto_finale/css/backend/indexes.css" />
  </head>
  <body>
    <? require('../sidebar.html'); ?>
    <table>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Plot</th>
      </tr>
      <? foreach($tv_series as $telefilm){ ?>
        <tr>
          <td><?= $telefilm["title"] ?></td>
          <td><?= substr($telefilm["description"], 0, 10) ?></td>
          <td><?= substr($telefilm["plot"], 0, 10) ?></td>
        </tr>
      <? } ?>
    </table>
  </body>
</html>
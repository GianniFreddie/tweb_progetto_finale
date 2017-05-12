<?
  session_start();
  include '../queries.php';
  include 'tv_series_controller.php';
  $result =  null;
  if(!empty($_REQUEST["title"]) && !empty($_REQUEST["creator_id"]) && !empty($_FILES["cover_image"])){
    create_tv_serie($_REQUEST["title"], $_REQUEST["creator_id"]);
    $new_serie_id = tv_series_last_id()[0];
    $uploads_dir = dirname(getcwd()) . '/images/tv_series';
    $tmp_name = $_FILES["cover_image"]["tmp_name"];
    $name = $new_serie_id . "_logo.png";
    if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {
      $result = "File is valid, and was successfully uploaded.\n";
      //devo modificare il campo cover_image dell'ultimo record inserito con la posizione esatta della sua immagine di copertina
      mod_tv_serie_cover_image($new_serie_id, "/tweb_progetto_finale/images/tv_series/$name");
    } else {
       $result = "Possible file upload attack!\n";
    }

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
    <?= $result ?>
    <form action="/tweb_progetto_finale/tv_series/form.php" method="post" enctype = "multipart/form-data">
      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class = "form-control" name = "title" placeholder = "Titolo" />
      </div>
      <div class="form-group">
        <label for="cover_image">Seleziona l'immagine di copertina</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
        <input type="file" class = "form-control" name = "cover_image" />
      </div>
      <div class="form-group">
        <label for="creator_id">Seleziona il creatore della serie tv</label>
        <!-- prendo tutti gli autori di serie tv -->
        <?
          $authors = tv_series_creators();
        ?>
        <select name = "creator_id">
          <option value"">Seleziona l'autore</option>
          <? foreach($authors as $author){ ?>
            <option value="<?= $author['id'] ?>"> <?= $author["surname"] ?> <?= $author["name"] ?></option>
          <? } ?>
        </select>
        <a href="#"> O aggiungi un nuovo creatore</a>
      </div>
      <div class="form-group">
        <input type="submit" name="" value="Aggiungi una nuova serie tv">
      </div>

    </form>

  </body>
</html>

<?

  /*
  * Crea un nuovo record nella tabella tv_series_seasons
  * param: $season_id, id della stagione a cui si riferisce
  * param: $title, titolo della stagione
  * return:
  */
  function create_new_season($serie_id, $title){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //quote title
      $title_quoted = $db->quote($title);
      $insert_query = insert_season_query($serie_id, $title_quoted);
      $db->query($insert_query);
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

?>

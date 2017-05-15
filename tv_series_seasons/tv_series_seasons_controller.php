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

  /*
  * Join tra tabella episodi e tabella serie tv
  * param:
  * return: [PDOStatement] join tra stagione e serie tv
  */
  function seasons_series_join(){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $join_query = seasons_series_join_query();
      $results = $db->query($join_query);
      return $results;
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

?>

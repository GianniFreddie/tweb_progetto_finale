<?
  /*
  * Funzione che restituisce PDOStatements di tutte le serie tv presenti nel db
  * param:
  * return: [PDOStatement] serie tv sul web
  */
  function series_index(){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $index_query = tv_series_index_query();
      $tv_series = $db->query($index_query);
      return $tv_series;
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Conta il numero di stagioni della serie tv
  * params: serie_id, id della serie tv di cui contare le stagioni
  * return: numero di stagioni della serie
  */
  function number_of_seasons($serie_id) {
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $seasons_query = tv_serie_seasons($serie_id);
      $seasons = $db->query($seasons_query);
      return($seasons->rowCount());
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Numero di puntate associate alla serie tv, conta tutte le puntate associate a stagioni associate al telefilm specificato
  * param: serie_id, l'id della serie tv di cui contare le puntate
  * return: numero di putnate del telefilm
  */
  function number_of_episodes($serie_id) {
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $episodes_query = tv_series_episodes($serie_id);
      $episodes = $db->query($episodes_query);
      return($episodes->rowCount());
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

?>

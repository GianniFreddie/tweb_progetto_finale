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
  * Prende l'ultimo id della tabella tv_series per dare nome a immagine di copertina
  * param:
  * return: id ultimo record di tv_series
  */
  function tv_series_last_id(){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $last_id_query = last_tv_series_id_query();
      $result = $db->query($last_id_query);
      return $result->fetch();
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Create di una nuova serie tv
  * param: title, titolo della serie tv
  * param: cover_image, path dell'immagine di copertina della serie tv
  * param: creator_id, id dell'ideatore della serie tv
  */
  function create_tv_serie($title, $creator_id){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //quote parametri
      $title_quoted = $db->quote($title);
      $insert_query = insert_tv_serie($title_quoted, $creator_id);
      $db->query($insert_query);
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Modifica il campo cover_image con un nuovo valore
  * param: $id, l'id del record da modificare
  * param: $cover_image, valore da inserire
  * return:
  */
  function mod_tv_serie_cover_image($id, $cover_image){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //quote param
      $cover_image_quoted = $db->quote($cover_image);
      $update_query = update_cover_image_query($id, $cover_image_quoted);
      $db->query($update_query);
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

  /*
  * Id e nome dei creatori di serie tv per la select del form di inserimento nuova serie tv
  * param:
  * return: [PDOStatement] con id e nome ideatori serie tv
  */
  function tv_series_creators() {
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $select_query = select_tv_series_creators();
      $tv_series_creators = $db->query($select_query);
      return $tv_series_creators;
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Funzione per salvare nuovo record nella tabella users_tvseries, richiamata da api ajax
  * param: tv_serie_id, l'id della serie tv da salvare come watched
  * param: user_id, l'id dello user che ha compiuto l'azione
  * param: action, azione eseguita -> ["watched", "watching", "wish"]
  * return:
  */
  function watched_create($tv_serie_id, $user_id, $action){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $action_flag = -1;
      /*
      * 0-> watched
      * 1-> watching
      * 2-> wish
      */
      switch($action){
        case "watched":
          $action_flag = 0;
          break;
        case "watching":
          $action_flag = 1;
          break;
        case "wish":
          $action_flag = 2;
          break;
      }
      $insert_query = insert_into_users_tvseries_query($tv_serie_id, $user_id, $action_flag);
      $result = $db->query($insert_query);
      return $result;
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

?>

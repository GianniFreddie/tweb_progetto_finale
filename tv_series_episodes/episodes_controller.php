<?

  /*
  * Inserisce una nuova puntata della serie tv
  * param: $season_id, l'id della stagione a cui appartiene la puntata
  * param: $title, il titolo dell'episodio
  * param: $duration, la durata in minuti della puntata
  * param: $episode_order, l'ordine della puntata nella stagione
  */
  function insert_episode($season_id, $title, $duration, $episode_order){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //quote
      $title_quoted = $db->quote($title);
      $insert_query = insert_episode_query($season_id, $title_quoted, $duration, $episode_order);
      $db->query($insert_query);
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

?>

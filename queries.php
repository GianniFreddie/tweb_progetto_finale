<?
  /*
  * Restituisce la query necessaria per cercare un utente in base al suo indirizzo email
  * param: $email, indirizzo email già quoted
  * return: query di ricerca utente
  */
  function search_by_email_query($email){
    return "SELECT * FROM users WHERE email = $email";
  }

  /*
  * Ritorna la query necessaria per inserire un nuovo utente
  * params: $email già quoted
  * params: $nickname già quoted
  * params: $psw già quoted
  * return: query
  */
  function users_insert_query($email, $nickname, $psw){
    return "INSERT INTO users (email, nickname, psw) VALUES ($email, $nickname, $psw)";
  }

  /*
  * Restituisce la query per cercare un elemento in una tabella qualsiasi in base al suo id
  * param: $id, valore dell'id da inserire nella query
  * param: $table, il nome della tabella in cui effettuare la ricerca
  * return: query di ricerca per id
  */
  function search_by_id_query($id, $table){
    return "SELECT * FROM $table WHERE id = $id";
  }

  /*
  * Query per elencare tutte le serie tv presenti nel db
  * param:
  * return: query che lista tutte le serie tv presenti nel db
  */
  function tv_series_index_query(){
    return "SELECT * FROM tv_series";
  }

  /*
  * Query per cercare tutte le stagioni collegate ad una serie tv
  * param: serie_id, id della serie tv
  * return: [PDOStatement] tutte le stagioni legate alla serie
  */
  function tv_serie_seasons($serie_id) {
    return "SELECT * FROM tv_series_seasons WHERE serie_id = $serie_id";
  }

  /*
  * Query per contare le puntate associate ad un singolo telefilm
  * param: serie_id, l'id della serie tv
  * return: [PDOStatement] di tutte le puntate associate al telefilm
  */
  function tv_series_episodes($serie_id) {
    return "SELECT * FROM tv_series_episodes WHERE season_id IN ({tv_series_seasons($serie_id)})";
  }

  /*
  * Query per prendere i creatori di serie tv
  * param:
  * return: query di selezione creatori serie tv
  */
  function select_tv_series_creators() {
    return "SELECT * FROM tv_series_creators";
  }

  /*
  * Create di una nuova serie tv
  * param: $title, titolo gia quoted
  * param: $cover_image, path dell'immagine di copertina già quoted
  * param: $creator_id, id dell'ideatore della serie tv
  * return: query di inserimento serie tv
  */
  function insert_tv_serie($title, $creator_id) {
    return "INSERT INTO tv_series (title, creator_id) VALUES ($title, $creator_id)";
  }

  /*
  * Prende ultimo id della tabella tv_Series
  * param:
  * return: query di selezione utlimo id
  */
  function last_tv_series_id_query(){
    return "SELECT max(id) FROM tv_series";
  }

  /*
  * Query di update per cover_image di una singola tv_serie_seasons
  * param: $id, l'id della serie da modificare
  * param: $cover_image, nuovo valore da inserire
  * return: Query di modifica cover_image
  */
  function update_cover_image_query($id, $cover_image){
    return "UPDATE tv_series SET cover_image = $cover_image WHERE id = $id";
  }

  /*
  * Query per inserire un nuovo record nella tabella tv_series_seasons
  * param: $serie_id, id della serie a cui appartiene la stagione
  * param: $title, titolo della stagione già quoted
  * return: Query insert
  */
  function insert_season_query($serie_id, $title){
    return "INSERT INTO tv_series_seasons (serie_id, title) VALUES ($serie_id, $title) ";
  }

  /*
  * Query per selezionare stagioni in join con serie tv
  * param:
  * return: query di join tra seasons e series
  */
  function seasons_series_join_query(){
    return "SELECT tv_series_seasons.id as season_id, tv_series_seasons.title as season_title, tv_series.title as title FROM tv_series_seasons, tv_series WHERE serie_id = tv_series.id";
  }

  /*
  * Query per inserire una nuova puntata
  * param: $season_id, l'id della stagione
  * param: $title, titolo dell'episodio
  * param: $duration, durata dell'episodio in minuti
  */
  function insert_episode_query($season_id, $title, $duration, $episode_order){
    return "INSERT INTO tv_series_episodes (season_id, title, duration, episode_order) VALUES ($season_id, $title, $duration, $episode_order)";
  }

?>

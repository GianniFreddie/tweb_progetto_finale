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

?>

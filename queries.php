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

?>

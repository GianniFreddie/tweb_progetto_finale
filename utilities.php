<?
  /*
  * Funzione che esegue la routine di autenticazione, cerca lo user se esiste e controlla la psw
  * params: user_email, l'email inserita nel form
  * params: user_psw, la password dello user
  * return: true se tutto ok, messaggio di errore altrimenti
  */
  function authenticate_user($user_email, $user_psw){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //user email escape and quote
      $user_email = $db->quote($user_email);
      //cerco l'utente
      $user_search_query = "SELECT psw FROM users WHERE email = $user_email";
      $user_research_result = $db->query($user_search_query);
      if(!$user_research_result){//query sbagliata
        return("The user research query is wrong");
      }else if($user_research_result->rowCount() == 0){//user non trovato
        return("Email not found");
      }
      //controllo password
      $db_user_psw = $user_research_result->fetch()["psw"];
      if($user_psw == $db_user_psw){
        return "ok";
      }else{
        return("The password is wrong");
      }
    } catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Funzione per registrare un nuovo utente, crea connessione con db e inserisce utente con dati passati
  * params: nickname, email, psw del nuovo utente da aggiungere
  * return: true se tutto ok, false altrimenti
  */
  function register_new_user($nickname, $email, $psw) {
    //conntect with db
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //quote dei parametri
      $nickname = $db->quote($nickname);
      $email = $db->quote($email);
      $psw = $db->quote($psw);
      //query
      $insert_query = "INSERT INTO users (email, nickname, psw) VALUES ($email, $nickname, $psw)";
      $insert_result = $db->query($insert_query);
      if(!$insert_result){
        return("The query is wrong");
      }else{
        return("ok");
      }
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

?>

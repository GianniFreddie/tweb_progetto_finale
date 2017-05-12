<?
  /*
  * Funzione che esegue la routine di autenticazione, cerca lo user se esiste e controlla la psw
  * params: user_email, l'email inserita nel form
  * params: user_psw, la password dello user
  * return: true se tutto ok, messaggio di errore altrimenti
  */
  function authenticate_user($user_email, $user_psw){
    $user_stmt = search_user_by_email($user_email);
    if(!$user_stmt){//query sbagliata
      return("The user research query is wrong");
    }else if($user_stmt->rowCount() == 0){//user non trovato
      return("Email not found");
    }
    //recupero info relative all'utente
    $user = $user_stmt->fetch();
    //controllo password
    $db_user_psw = $user["psw"];
    if($user_psw == $db_user_psw){
      //create session
      session_start();
      //save data
      $_SESSION["current_user_id"] = $user["id"];
      $_SESSION["current_user_nickname"] = $user["nickname"];
      return "ok";
    }else{
      return("The password is wrong");
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
      $nickname_quoted = $db->quote($nickname);
      $email_quoted = $db->quote($email);
      $psw = $db->quote($psw);
      //query
      $insert_query = users_insert_query($email_quoted, $nickname_quoted, $psw);
      $insert_result = $db->query($insert_query);
      if(!$insert_result){
        return("The query is wrong");
      }else{
        //close connection
        $db = NULL;
        //recupera l'user appena salvato per inserire il suo id in sessione
        $user_stmt = search_user_by_email($email);
        if($user_stmt && $user_stmt->rowCount() > 0){
          //prendo info user
          $user = $user_stmt->fetch();
          //create session
          session_start();
          //save data
          $_SESSION["current_user_id"] = $user["id"];
          $_SESSION["current_user_nickname"] = $user["nickname"];
          return("ok");
        }

      }
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Cerca un utente in base al suo indirizzo email, essendo univoco si può effettuare la ricerca in base a questo parametro
  * param: $email, indirizzo email utente
  * return: PDOStatement risultato della ricerca
  */
  function search_user_by_email($email) {
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //quote email
      $email = $db->quote($email);
      //query
      $research_query = search_by_email_query($email);
      //execute
      $results = $db->query($research_query);
      return $results;
    }catch(PDOException $e){
      return($e->getMessage());
      die();
    }
  }

  /*
  * Cerca l'user in base al suo id
  * param: $user_id
  * return: PDOStatement risultato della ricerca
  */
  function search_by_user_id($user_id){
    try{
      $db = new PDO('mysql:host=localhost;dbname=progettoFinale_develop', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //query
      $search_query = search_by_id_query($user_id, 'users');
      //esegui query
      $result = $db->query($search_query);
      return $result;
    }catch(PDOException $e){
      return($e->getMessage());
      die();

    }
  }

?>

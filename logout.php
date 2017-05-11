<?
  session_start();
  #distrugge sessione
  unset($_SESSION);
  session_destroy();
  #redirige alla pagina principale
  header('Location: http://localhost:3005/tweb_progetto_finale/index.php');
?>

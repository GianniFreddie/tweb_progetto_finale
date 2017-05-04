<?
  session_start();
  $user_nickname = $_SESSION["current_user_nickname"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <h1>Hello <?=$user_nickname?></h1>
  </body>
</html>

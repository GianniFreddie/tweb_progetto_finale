<?
  session_start();
  $user_nickname = $_SESSION["current_user_nickname"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name = "author" content = "Testa Giovanni MATR:777810" />
    <link rel = "stylesheet" href = "/tweb_progetto_finale/css/feeds.css" />
		<link rel = "stylesheet" href = "/tweb_progetto_finale/bootstrap/css/bootstrap.css" />
  </head>
  <body>
    <nav class = "navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
           <a class="navbar-brand" href="#"><img src = "/tweb_progetto_finale/images/site-icon.png"/><p>Nerd organizer</p></a>
        </div>
        <div class = "collapse navbar-collapse pull-right">
          <ul class = "nav navbar-nav">
            <li class = "active"><a href="#">Home</a></li>
            <li><a href="#">Tv series</a></li>
            <li><a href="#">Games</a></li>
            <li><a href="#">Movies</a></li>
            <li><a href="#">Comics</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
</html>

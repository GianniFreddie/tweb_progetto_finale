<?
  session_start();
  include 'utilities.php';
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
           <a class="navbar-brand" href="#"><img src = "/tweb_progetto_finale/images/site-icon.png"/><h1>Nerd organizer</h1></a>
        </div>
        <div class = "collapse navbar-collapse navbar-right">
          <ul class = "nav navbar-nav">
            <li class = "active"><a href="#">Home</a></li>
            <li><a href="#">Tv series</a></li>
            <li><a href="#">Games</a></li>
            <li><a href="#">Movies</a></li>
            <li><a href="#">Comics</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/tweb_progetto_finale/logout.php">Logout</a></li>
                <li><a href="#">Edit profile</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class = "profile-info">
        <!-- prendo info utente -->
        <?
          $user_id = $_SESSION["current_user_id"];
          $user_stmt = search_by_user_id($user_id);
          if($user_stmt && $user_stmt->rowCount() > 0){
            $user = $user_stmt->fetch();
          }else{
            print("ERRORE");
          }
        ?>
        <h3>@<?= $user["nickname"] ?></h3>
        <div class="row">
          <div class="col-md-3 ">
            <p>Name:</p>
          </div>
          <div class="col-md-6">
            <? if($user["name"] != null) { ?>
              <p><?= ucfirst($user["name"]) ?></p>
            <? }else{ ?>
              <p> - </p>
            <? }?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 ">
            <p>Surname:</p>
          </div>
          <div class="col-md-6">
            <? if($user["surname"] != null) { ?>
              <p><?= $user["surname"] ?></p>
            <? }else{ ?>
                <p> - </p>
            <? } ?>

          </div>
        </div>
        <div class="row">
          <div class="col-md-3 ">
            <p>School:</p>
          </div>
          <div class="col-md-6">
            <? if($user["school"] != null) { ?>
              <p><<?= $user["school"] ?></p>
            <? }else{ ?>
              <p> - </p>
            <? } ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 ">
            <p>Job:</p>
          </div>
          <div class="col-md-6">
            <? if($user["job"] != null) { ?>
              <p><<?= $user["job"] ?></p>
            <? }else{ ?>
              <p> - </p>
            <? } ?>
          </div>
        </div>
      </div>
      <!-- div ore spese a fare cose -->
      <div class="time-info">
        <div class="row">
          <div class = "col-md-8 ">
            <p>Hours spent watching tv series:</p>
          </div>
          <div class="col-md-4">
            <p> - </p>
          </div>
        </div>
      </div>
    </div>
    <script src="/tweb_progetto_finale/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/tweb_progetto_finale/bootstrap/js/bootstrap.js"></script>
  </body>
</html>

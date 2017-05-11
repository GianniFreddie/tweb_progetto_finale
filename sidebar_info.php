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

<?
  session_start();
  include '../queries.php';
  include '../tv_series/tv_series_controller.php';

  $response;

  if(empty($_REQUEST['tv_serie_id']) || empty($_REQUEST['user_id'])){
    http_response_code(422);
    $response = "Parameters passed are wrong";
  }else{
    $tv_serie_id = $_REQUEST['tv_serie_id'];
    $user_id = $_REQUEST['user_id'];
    $action = "wish";
    $insert_result = users_tvseries_create($tv_serie_id, $user_id, $action);
    if($insert_result){
      http_response_code(201);
      $response = "Ok";
    }else{
      http_response_code(500);
    }
  }
?>

<?= json_encode($response) ?>

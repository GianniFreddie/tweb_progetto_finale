<?
  session_start();
  include '../queries.php';

  $response;

  if(empty($_REQUEST['tv_serie_id']) || empty($_REQUEST['user_id'])){
    // http_response_code(422);
    $response = "Parameters passed are wrong";
  }else{
    $tv_serie_id = $_REQUEST['tv_serie_id'];
    $user_id = $_REQUEST['user_id'];
    $action = "watched";
  }

?>

<?= json_encode() ?>

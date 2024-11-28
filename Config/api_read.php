<?php

include'config.php';

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

$c1 = new Config();

if($_SERVER['REQUEST_METHOD']=='GET'){

  $data = [];
  $result = $c1->selectDatabase();
  $record = mysqli_fetch_assoc($result);

  while($record = mysqli_fetch_assoc($result)){
      array_push($data, $record);
  }
  $arr['data'] = $data;
}
else{
    $arr['err'] = "Only GET HTTP requests are allow!!";
}

echo json_encode($arr);



?>
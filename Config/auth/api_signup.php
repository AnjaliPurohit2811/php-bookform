<?php


header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
include'user_config.php';

$c1 = new UserConfig();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $c1->signUp($username, $email, $password);
    if ($res) {
        $arr['status'] = "Record insertaion successfully!!";
    } else {
        $arr['error'] = "Record insertaion failed!!";
    }
} else {
    $arr['err'] = "Only POST method is allowed !!";
}

echo json_encode($arr);

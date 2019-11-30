<?php
include "../App/bootstrap.php";

//$a = new App_Models_Users();

// insert du lieu
/*$result = $a->buildQueryParam([
    "field"=>"(username, password) values (?,?)",
    "value"=>["admin", md5("admin")]
])->insert();
var_dump($result);*/

//select du lieu
/*$result = $a->buildQueryParam([
    "select"=>"*",
    "where"=>""
])->select();

var_dump($result);*/

$router = new App_Libs_Router(__DIR__);
$router->router();
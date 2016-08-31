<?php

//option 1: connect to db

// $db_name = "cms";
// $db_user = "root";
// $db_password = "";
// $db_host = "localhost";

// $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

// if(!$connection){
// 	die("Can't connect to DB");
// }


//option 2: connect to db: more secure by converting it to constant

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_password'] = "";
$db['db_name'] = "cms";


//  function to make the array value constant
foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD,DB_NAME);

if(!$connection){
	die("Can't connect to DB");
}















?>
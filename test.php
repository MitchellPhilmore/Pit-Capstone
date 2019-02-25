<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once( "./assets/php/includes.php" );

$connection = $common->db->connect();
$bulk = new MongoDB\Driver\BulkWrite;
$document1 = [
    'username' => 'test', 
    'password' => sha1( md5( 'test' ) ),
    'email' => 'test@test.com',
];
$bulk->insert($document1);
$result = $connection->executeBulkWrite('e-commerce.users', $bulk);



var_dump($result);*/

exit( json_encode($_POST ) );
?>
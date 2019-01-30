<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once( "./class.db.php" );


$connection = db::connect();
$query = new MongoDB\Driver\Query(
	array(),
	array(
		"limit" => 5,
		"sort" => array(
			'timePosted' => -1
		)
	)
);
$rows = $connection->executeQuery( 'e-commerce.products', $query );
$products = array();
foreach($rows as $r){
   array_push($products,$r);
}

exit( json_encode( $products ) );

?>
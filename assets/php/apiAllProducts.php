<?php

require_once( "./includes.php" );

$connection = db::connect();
$query = new MongoDB\Driver\Query(
	array(),
	array(
		"sort" => array(
			'timePosted' => -1
		)
	)
);
$rows = $connection->executeQuery( 'e-commerce.products', $query );
$products = array();
foreach( $rows as $r ) {
	
   array_push($products,$r);
}

exit( json_encode( $products ) );

?>
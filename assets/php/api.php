<?php

require_once( "./includes.php" );

class API {
	
	function __construct() {
		
	}
	
	function create_product() {
		
		
	}
	
	function get_product() {
		
		$product_id = 0;
		
		if( isset( $_GET["product_id"] ) && is_int( $_GET["product_id"] ) ) {
			
			$product_id = $_GET["product_id"];
		}
		
		$connection = db::connect();
		$query = new MongoDB\Driver\Query(
			array(
				"_id" => (string)$product_id
			),
			array(
				"sort" => array(
					'timePosted' => -1
				),
			)
		);
		$rows = $connection->executeQuery( 'e-commerce.products', $query );
		$products = array();
		foreach( $rows as $r ) {
			
			array_push($products,$r);
		}
		exit( json_encode( $products ) );
	}
	
	function get_products() {
		
		$limit = 0;
		
		if( isset( $_GET["limit"] ) && is_int( $_GET["limit"] ) ) {
			
			$limit = $_GET["limit"];
		}
		
		$connection = db::connect();
		$query = new MongoDB\Driver\Query(
			array(),
			array(
				"sort" => array(
					'timePosted' => -1
				),
				"limit" => (integer)$limit
			)
		);
		$rows = $connection->executeQuery( 'e-commerce.products', $query );
		$products = array();
		foreach( $rows as $r ) {
			
			array_push($products,$r);
		}
		exit( json_encode( $products ) );
	}
}

?>
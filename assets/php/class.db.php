<?php

require_once( '/www/vendor/autoload.php' );
require_once( '/www/authentication.php' );

class db {
	
	function __construct() {
		
	}
	
	function connect() {
		
		$credentials = new credentials();
		$username = $credentials->db_username;
		$password = $credentials->db_password;
		$connection = new MongoDB\Client( "mongodb://$username:$password@ds153814.mlab.com:53814/e-commerce" );
		$database = $connection->selectDatabase( "e-commerce" );
		return( $database );
	}
}
?>
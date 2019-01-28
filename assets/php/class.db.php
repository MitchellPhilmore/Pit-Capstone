<?php

require_once( '/www/vendor/autoload.php' );
require_once( '/www/authentication.php' );

class db {
	
	function __construct() {
		
	}
	
	public static function connect() {
		
		$credentials = new credentials();
		$username = $credentials->db_username;
		$password = $credentials->db_password;
		$connection = new MongoDB\Driver\Manager( "mongodb://$username:$password@ds153814.mlab.com:53814/e-commerce" );
		return( $connection );
	}
}
?>
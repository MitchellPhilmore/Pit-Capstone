<?php

require_once( '/www/vendor/autoload.php' );
require_once( '/www/authentication.php' );

class db {
	
	public $connection = null;
	
	function __construct() {
		
		
	}
	
	public function connect() {
		
		$connection = $this->connection;
		
		if( $connection == null ) {
			
			$credentials = new credentials();
			$username = $credentials->db_username;
			$password = $credentials->db_password;
			$connection = new MongoDB\Driver\Manager( "mongodb://$username:$password@ds153814.mlab.com:53814/e-commerce" );
			$this->connection = $connection;
		}
		
		return( $connection );
	}
	
	public function find( $collection, $filter = array(), $options = array() ) {
		
		$query = new MongoDB\Driver\Query( $filter, $options );
		return $this->connect()->executeQuery( "e-commerce.$collection", $query )->toArray();
	}
}
?>
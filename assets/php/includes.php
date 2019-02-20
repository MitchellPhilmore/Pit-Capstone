<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require_once( "/var/www/vendor/autoload.php" );
require_once( "class.db.php" );
require_once( "config.php" );

class common {
	
	public $actual_link = null;
	public $db = null;
	public $login_file = "../../login.php";
	
	function __construct() {
		
		$this->db = new db();
		$this->actual_link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
	
	function check_session() {
		
		if( ( ! isset( $_SESSION["user"] ) || ! isset( $_SESSION["token"] ) ) && strpos( $actual_link, "login.php" ) == false ) {
			
			$file_info = pathinfo( $actual_link );
			
			if( isset( $file_info['extension'] ) ) {
				
				str_replace( $file_info['filename'] . "." . $file_info['extension'], "", $url );
			}
			
			//header( "Location: {$actual_link}login.php" );
			//die();
		} else {
			
			$this->check_token();
		}
	}
	
	function check_token() {
		
		$connection = $this->db->connect();
		$filter = array(
			'username' => (string)$_SESSION["username"],
			'token' => (string)$_SESSION["token"]
		);
		$result = $this->db->find( "users", $filter );
		
		if( ! empty( $result ) ) {
			
			
		}
	}
	
	function encrypt( $string ) {
		
		return( sha1( md5( $string ) ) );
	}
	
	function escape( $string ) {
		
		return strtolower( addslashes( htmlspecialchars( $string ) ) );
	}
	
	function login() {
		
		if( isset( $_POST["username"] ) && isset( $_POST["password"] ) ) {
			
			$username = $this->escape( $_POST["username"] );
			$password = $this->encrypt( $_POST["password"] );
			
			$filter = array(
				'username' => (string)$username,
				'password' => (string)$password
			);
			
			$result = $this->db->find( "users", $filter );
			
			print( "<pre>" . print_r( $result, true ) . "</pre>" );
			die();
			
			if( ! empty( $result ) ) {
				
				$_SESSION["user"] = '';
				$_SESSION["token"] = "";
			} else {
				
				$token = mb_strtoupper( strval( bin2hex( openssl_random_pseudo_bytes( 16 ) ) ) );
			}
		}
	}
	
	function unescape( $string ) {
		
		return htmlspecialchars_decode( stripslashes( $string ) );
	}
}

global $common;
$common = new Common();

?>
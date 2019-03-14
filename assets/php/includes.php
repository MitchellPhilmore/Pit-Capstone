<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require_once( "assets/vendor/autoload.php" );
require_once( "class.db.php" );
require_once( "config.php" );

class common {
	
	public $actual_link = null;
	public $db = null;
	public $login_file = "../../login.php";
	
	function __construct() {
		
		session_start();
		$this->db = new db();
		$this->actual_link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$this->check_session();
	}
	
	function check_session() {
		
		if( ( ! isset( $_SESSION["username"] ) || ! isset( $_SESSION["token"] ) ) && strpos( $this->actual_link, "login.php" ) == false ) {
			
			$file_info = pathinfo( $actual_link );
			
			if( isset( $file_info['extension'] ) ) {
				
				str_replace( $file_info['filename'] . "." . $file_info['extension'], "", $url );
			}
			
			header( "Location: {$actual_link}login.php" );
			die();
		} elseif( strpos( $this->actual_link, "login.php" ) == false ) {
			
			$this->check_token();
		}
	}
	
	function check_token() {
		
		
	}
	
	function encrypt( $string ) {
		
		return( sha1( md5( $string ) ) );
	}
	
	function escape( $string ) {
		
		return strtolower( addslashes( htmlspecialchars( $string ) ) );
	}
	
	function login() {
		
		if( isset( $_POST["login"] ) && isset( $_POST["username"] ) && isset( $_POST["password"] ) ) {
			
			$username = $this->escape( $_POST["username"] );
			$password = $this->encrypt( $_POST["password"] );
			$token = mb_strtoupper( strval( bin2hex( openssl_random_pseudo_bytes( 16 ) ) ) );
			
			$connection = $this->db->connect();
			$query = new MongoDB\Driver\Query(
				array(
					'username' => (string)$username,
					'password' => (string)$password
				),
				array()
			);
			$results = $connection->executeQuery( 'e-commerce.users', $query );
			$users = array();
			
			foreach( $results as $r ) {
				
				unset( $r->password );
				array_push( $users, $r );
			}
			
			if( count( $users ) == 1 ) {
				
				$bulk = new MongoDB\Driver\BulkWrite;
				$bulk->update(
					array(
						'username' => (string)$username,
						'password' => (string)$password
					),
					array(
						'$set' => array( 'token' => (string)$token )
					),
					
					array(
						'multi' => false,
						'upsert' => false
					)
				);
				
				$_SESSION["id"] = $users[0]->_id;
				$_SESSION["username"] = (string)$username;
				$_SESSION["firstname"] = $users[0]->firstname;
				$_SESSION["lastname"] = $users[0]->lastname;
				$_SESSION["email"] = $users[0]->email;
				$_SESSION["token"] = (string)$token;
				header('Location: index.php');
			} else {
				
				$_SESSION["username"] = "";
				$_SESSION["token"] = "";
				?>
				<p>Error, Failed to login</p>
				<?php
				echo "<pre>" . print_r( $results, true ) . "</pre>";
				echo "<pre>" . print_r( $users, true ) . "</pre>";
				echo count( $users );
				return;
			}
		}
	}
	
	function signup() {
		
		if( isset( $_POST["signup"] ) && isset( $_POST["username"] ) && isset( $_POST["password"] ) ) {
			
			$firstName = $this->escape( $_POST["firstName"] );
			$lastName = $this->escape( $_POST["lastName"] );
			$email = $this->escape( $_POST["email"] );
			$signUpPassword = $this->encrypt( $_POST["password"] );
			$verifyPassword = $this->encrypt( $_POST["verifyPassword"] );
			$username = $this->escape( $_POST["username"] );
			
			$result = array(
				$firstName,
				$lastName,
				$email,
				$signUpPassword,
				$verifyPassword,
				$username,
			);
			
			if( ! $signUpPassword == $verifyPassword ) {
				
				?>
				<p>Error, The passwords are not the same</p>
				<?php
				return;
			}
			
			$connection = $this->db->connect();
			$bulk = new MongoDB\Driver\BulkWrite;
			$document1 = [
				'firstname' => (string)$firstName,
				'lastname' => (string)$lastName,
				'email' => (string)$email,
				'username' => (string)$username, 
				'password' => (string)$signUpPassword,
				'token' => (string)'',
			];
			$bulk->insert($document1);
			$result = $connection->executeBulkWrite( 'e-commerce.users', $bulk );
		}
	}
	
	function unescape( $string ) {
		
		return htmlspecialchars_decode( stripslashes( $string ) );
	}
}

global $common;
$common = new Common();

?>
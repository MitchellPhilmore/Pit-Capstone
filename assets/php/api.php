<?php

require_once( "./includes.php" );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class API {
	
	function __construct() {
		
		echo var_dump( $_GET );
		
		if( isset( $_GET["action"] ) && $_GET["action"] == "sendSwappedEmails" ) {
			
			$this->send_swapped_emails();
		}
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
	
	function send_swapped_emails() {
		
		ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
		
		global $common;
		$buyer = $_GET["buyer"];
		$seller = $_GET["seller"];
		$product_id = $_GET["product"];
		$mail = new PHPMailer(true);
		$connection = $common->db->connect();
		$buyer_info = "";
		$seller_info = "";
		
		$query = new MongoDB\Driver\Query(
			array(
				'username' => (string)$buyer,
			),
			array(
			)
		);
		$rows = $connection->executeQuery( 'e-commerce.users', $query );
		$users = array();
		foreach( $rows as $r ) {
			
			array_push($users,$r);
		}
		
		if( count( $users ) > 1 ) {
			
			exit( "Too many users with the same username: " . $buyer );
		} elseif( count( $users ) == 0 ) {
			
			exit( "No user was found with username: " . $buyer );
		}
		
		$buyer = $users[0];
		
		$query = new MongoDB\Driver\Query(
			array(
				'username' => (string)$seller,
			),
			array(
			)
		);
		$rows = $connection->executeQuery( 'e-commerce.users', $query );
		$users = array();
		foreach( $rows as $r ) {
			
			array_push($users,$r);
		}
		
		if( count( $users ) > 1 ) {
			
			exit( "Too many users with the same username: " . $seller );
		} elseif( count( $users ) == 0 ) {
			
			exit( "No user was found with username: " . $seller );
		}
		
		$seller = $users[0];
		$buyer->firstname = ucfirst( $buyer->firstname );
		$buyer->lastname = ucfirst( $buyer->lastname );
		$seller->firstname = ucfirst( $seller->firstname );
		$seller->firstname = ucfirst( $seller->firstname );
		$buyer_info .= "<li>Name: {$buyer->firstname} {$buyer->lastname}</li>";
		$buyer_info .= "<li>Email: {$buyer->email}</li>";
		$seller_info .= "<li>Name: {$seller->firstname} {$seller->lastname}</li>";
		$seller_info .= "<li>Email: {$seller->email}</li>";
		
		try {
			
			$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = 'dev.pit.edu';
			$mail->SMTPAuth = true;
			$mail->Username = 'noreply@dev.pit.edu';
			$mail->Password = 'testing';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->setFrom( 'noreply@dev.pit.edu', 'Mailer' );
			$mail->addAddress( $seller->email, "{$seller->firstname} {$seller->lastname}" );
			$mail->isHTML(true);
			$mail->Subject = "{$seller->firstname}, {$buyer->firstname} is interested in a product.";
			$mail->Body    = "Hello,<br>The seller below has taken an interest in your <a href='https://dev.pit.edu/workspace/e-commerce_capstone2019/product.php?product={$product_id}'>product</a>.<br>Buyer Info:<br><ul>{$buyer_info}</ul>.";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			$mail->send();
			echo 'Message has been sent';
		} catch ( Exception $e ) {
			
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
		
		try {
			
			$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = 'dev.pit.edu';
			$mail->SMTPAuth = true;
			$mail->Username = 'noreply@dev.pit.edu';
			$mail->Password = 'testing';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->setFrom( 'noreply@dev.pit.edu', 'Mailer' );
			$mail->addAddress( $buyer->email, "{$buyer->firstname} {$buyer->lastname}" );
			$mail->isHTML(true);
			$mail->Subject = "{$buyer->firstname}, you mentioned you were interested in a product.";
			$mail->Body    = "Hello,<br>The seller below has a <a href='https://dev.pit.edu/workspace/e-commerce_capstone2019/product.php?product={$product_id}'>product</a> you are interested in.<br>Seller Info:<br><ul>{$seller_info}</ul>.";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			$mail->send();
			echo 'Message has been sent';
		} catch ( Exception $e ) {
			
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
}

$api = new API();

?>
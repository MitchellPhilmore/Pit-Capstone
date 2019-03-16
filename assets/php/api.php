<?php

require_once( "./includes.php" );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class API {
	
	function __construct() {
		
		echo var_dump( $_GET );
		$this->send_swapped_emails();
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
		
		$mail = new PHPMailer(true);
		try {
			
			//Server settings
			$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = 'dev.pit.edu';
			$mail->SMTPAuth = true;
			$mail->Username = 'noreply@dev.pit.edu';
			$mail->Password = 'testing';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 465;
			
			//Recipients
			$mail->setFrom( 'noreply@dev.pit.edu', 'Mailer' );
			$mail->addAddress( 'fasvi6@gmail.com', 'Wheatly' );
			$mail->addAddress( 'xevidos@gmail.com', 'Chell' );
			//$mail->addReplyTo( 'info@example.com', 'Information' );
			//$mail->addCC( 'cc@example.com' );
			//$mail->addBCC( 'bcc@example.com' );
			
			//Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
			
			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
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
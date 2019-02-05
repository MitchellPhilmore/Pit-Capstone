<?php

require_once('./assets/php/includes.php');

$connection = db::connect();
$query = new MongoDB\Driver\Query(
	array(
		"id" => (int)$_GET[""],
	),
	array(
		"limit" => 1,
		"sort" => array(
			'timePosted' => -1
		)
	)
);
$rows = $connection->executeQuery( 'e-commerce.products', $query );

if( $product ) {

	?>
	<form action="charge.php" method="post">
		<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="<?php echo $stripe['publishable_key']; ?>"
			data-description="<?php echo $stripe['publishable_key']; ?>"
			data-amount="<?php echo $stripe['publishable_key']; ?>"
			data-locale="auto">
		</script>
	</form>
	<?php
} else {
	
	?>
	<p>Error, could not find the prod</p>
	<?php
}
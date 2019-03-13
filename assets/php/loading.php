<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Loading {
	
	const ICONS = array(
		"ripples",
		"pistons",
		"marching_dots",
	);
	
	public $color = "000000";
	
	function __construct() {
		
		if( isset( $_GET["color"] ) ) {
			
			$this->color = "#" . $_GET["color"];
		}
		
		if( isset( $_GET["icon"] ) ) {
			
			$icon = $_GET["icon"];
		} else {
			
			$icon = "load_random";
		}
		
		switch( $icon ) {
			
			case( "load_random" ):
				
				$id = $this->get_random();
				$function = self::ICONS[$id];
				
				if( method_exists( $this, $function ) ) {
					
					exit( call_user_func( array( $this, $function ) ) );
				} else {
					
					exit( "Error, could not find loading animation." );
				}
			break;
			
			default:
				
				if( method_exists( $this, $function ) ) {
					
					exit( call_user_func( array( $this, $function ) ) );
				} else {
					
					exit( "Error, could not find loading animation." );
				}
			break;
		}
	}
	
	function get_random() {
		
		$total = ( count( self::ICONS ) - 1 );
		$id = rand( 0, $total );
		return $id;
	}
	
	/**
	 * Icon functions
	 */
	
	function example() {
		
		ob_start();
		?>
		<?php
		return ob_get_clean();
	}
	
	function ripples() {
		
		ob_start();
		
		?>
		<style>
			.lds-ripple {
				display: inline-block;
				position: relative;
				width: 64px;
				height: 64px;
			}
			
			.lds-ripple div {
				position: absolute;
				border: 4px solid <?php echo $this->color;?>;
				opacity: 1;
				border-radius: 50%;
				animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
			}
			
			.lds-ripple div:nth-child(2) {
				animation-delay: -0.5s;
			}
			
			@keyframes lds-ripple {
				
				0% {
					top: 28px;
					left: 28px;
					width: 0;
					height: 0;
					opacity: 1;
				}
				
				100% {
					top: -1px;
					left: -1px;
					width: 58px;
					height: 58px;
					opacity: 0;
				}
			}
		</style>
		<div class="lds-ripple"><div></div><div></div></div>
		<?php
		return ob_get_clean();
	}
	
	function pistons() {
		
		ob_start();
		?>
		<style>
			.lds-facebook {
				display: inline-block;
				position: relative;
				width: 64px;
				height: 64px;
			}
			
			.lds-facebook div {
				display: inline-block;
				position: absolute;
				left: 6px;
				width: 13px;
				background: <?php echo $this->color;?>;
				animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
			}
			
			.lds-facebook div:nth-child(1) {
				left: 6px;
				animation-delay: -0.24s;
			}
			
			.lds-facebook div:nth-child(2) {
				left: 26px;
				animation-delay: -0.12s;
			}
			
			.lds-facebook div:nth-child(3) {
				left: 45px;
				animation-delay: 0;
			}
			
			@keyframes lds-facebook {
				0% {
					top: 6px;
					height: 51px;
				}
				50%, 100% {
					top: 19px;
					height: 26px;
				}
			}
		</style>
		<div class="lds-facebook"><div></div><div></div><div></div></div>
		<?php
		return ob_get_clean();
	}
	
	function marching_dots() {
		
		ob_start();
		?>
		<style>
			.lds-ellipsis {
				display: inline-block;
				position: relative;
				width: 64px;
				height: 64px;
			}
			.lds-ellipsis div {
				position: absolute;
				top: 27px;
				width: 11px;
				height: 11px;
				border-radius: 50%;
				background: <?php echo $this->color;?>;
				animation-timing-function: cubic-bezier(0, 1, 1, 0);
			}
			.lds-ellipsis div:nth-child(1) {
				left: 6px;
				animation: lds-ellipsis1 0.6s infinite;
			}
			.lds-ellipsis div:nth-child(2) {
				left: 6px;
				animation: lds-ellipsis2 0.6s infinite;
			}
			.lds-ellipsis div:nth-child(3) {
				left: 26px;
				animation: lds-ellipsis2 0.6s infinite;
			}
			.lds-ellipsis div:nth-child(4) {
				left: 45px;
				animation: lds-ellipsis3 0.6s infinite;
			}
			@keyframes lds-ellipsis1 {
				0% {
					transform: scale(0);
				}
				100% {
					transform: scale(1);
				}
			}
			@keyframes lds-ellipsis3 {
				0% {
					transform: scale(1);
				}
				100% {
					transform: scale(0);
				}
			}
			@keyframes lds-ellipsis2 {
				0% {
					transform: translate(0, 0);
				}
				100% {
					transform: translate(19px, 0);
				}
			}
		</style>
		<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
		<?php
		return ob_get_clean();
	}
	
	function gooey_circle() {
		
		ob_start();
		?>
		<style>
			:root {
				--loader-color: #42ffcb;
			}
			
			svg {
				width: 400px;
				height: 400px;
			}
			
			svg rect {
				fill: red;
			}
			
			svg circle:nth-of-type(1) {
				-webkit-animation: expand_1 4s ease-in-out infinite, hue 12s linear infinite;
				animation: expand_1 4s ease-in-out infinite, hue 12s linear infinite;
				-webkit-animation-delay: 75ms;
				animation-delay: 75ms;
			}
			
			svg circle:nth-of-type(2) {
				-webkit-animation: expand_2 4s ease-in-out infinite, hue 12s linear infinite;
				animation: expand_2 4s ease-in-out infinite, hue 12s linear infinite;
				-webkit-animation-delay: 150ms;
				animation-delay: 150ms;
			}
			
			svg circle:nth-of-type(3) {
				-webkit-animation: expand_3 4s ease-in-out infinite, hue 12s linear infinite;
				animation: expand_3 4s ease-in-out infinite, hue 12s linear infinite;
				-webkit-animation-delay: 225ms;
				animation-delay: 225ms;
			}
			
			svg circle:nth-of-type(4) {
				-webkit-animation: expand_4 4s ease-in-out infinite, hue 12s linear infinite;
				animation: expand_4 4s ease-in-out infinite, hue 12s linear infinite;
				-webkit-animation-delay: 300ms;
				animation-delay: 300ms;
			}
			
			svg circle:nth-of-type(5) {
			-webkit-animation: expand_5 4s ease-in-out infinite, hue 12s linear infinite;
			animation: expand_5 4s ease-in-out infinite, hue 12s linear infinite;
			-webkit-animation-delay: 375ms;
			animation-delay: 375ms;
			}
			
			svg circle:nth-of-type(6) {
			-webkit-animation: expand_6 4s ease-in-out infinite, hue 12s linear infinite;
			animation: expand_6 4s ease-in-out infinite, hue 12s linear infinite;
			-webkit-animation-delay: 450ms;
			animation-delay: 450ms;
			}
			
			svg circle:nth-of-type(7) {
			-webkit-animation: expand_7 4s ease-in-out infinite, hue 12s linear infinite;
			animation: expand_7 4s ease-in-out infinite, hue 12s linear infinite;
			-webkit-animation-delay: 525ms;
			animation-delay: 525ms;
			}
			
			svg circle:nth-of-type(8) {
			-webkit-animation: expand_8 4s ease-in-out infinite, hue 12s linear infinite;
			animation: expand_8 4s ease-in-out infinite, hue 12s linear infinite;
			-webkit-animation-delay: 600ms;
			animation-delay: 600ms;
			}
			
			svg g {
			-webkit-filter: url("#goo");
			filter: url("#goo");
			-webkit-transform-origin: center center;
			transform-origin: center center;
			-webkit-animation: spin 4s ease-in-out infinite;
			animation: spin 4s ease-in-out infinite;
			}
			svg g circle {
			fill: #42e5ff;
			-webkit-transform-origin: center center;
			transform-origin: center center;
			}
			
			@-webkit-keyframes expand_1 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(99.99949px, -0.31853px, 0);
			transform: translate3d(99.99949px, -0.31853px, 0);
			}
			90% {
			-webkit-transform: translate3d(99.99949px, -0.31853px, 0);
			transform: translate3d(99.99949px, -0.31853px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			
			@keyframes expand_1 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(99.99949px, -0.31853px, 0);
			transform: translate3d(99.99949px, -0.31853px, 0);
			}
			90% {
			-webkit-transform: translate3d(99.99949px, -0.31853px, 0);
			transform: translate3d(99.99949px, -0.31853px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes expand_2 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(70.96361px, 70.45684px, 0);
			transform: translate3d(70.96361px, 70.45684px, 0);
			}
			90% {
			-webkit-transform: translate3d(70.96361px, 70.45684px, 0);
			transform: translate3d(70.96361px, 70.45684px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@keyframes expand_2 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(70.96361px, 70.45684px, 0);
			transform: translate3d(70.96361px, 70.45684px, 0);
			}
			90% {
			-webkit-transform: translate3d(70.96361px, 70.45684px, 0);
			transform: translate3d(70.96361px, 70.45684px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes expand_3 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(0.39816px, 99.99921px, 0);
			transform: translate3d(0.39816px, 99.99921px, 0);
			}
			90% {
			-webkit-transform: translate3d(0.39816px, 99.99921px, 0);
			transform: translate3d(0.39816px, 99.99921px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@keyframes expand_3 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(0.39816px, 99.99921px, 0);
			transform: translate3d(0.39816px, 99.99921px, 0);
			}
			90% {
			-webkit-transform: translate3d(0.39816px, 99.99921px, 0);
			transform: translate3d(0.39816px, 99.99921px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes expand_4 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-70.4003px, 71.0197px, 0);
			transform: translate3d(-70.4003px, 71.0197px, 0);
			}
			90% {
			-webkit-transform: translate3d(-70.4003px, 71.0197px, 0);
			transform: translate3d(-70.4003px, 71.0197px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@keyframes expand_4 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-70.4003px, 71.0197px, 0);
			transform: translate3d(-70.4003px, 71.0197px, 0);
			}
			90% {
			-webkit-transform: translate3d(-70.4003px, 71.0197px, 0);
			transform: translate3d(-70.4003px, 71.0197px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes expand_5 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-99.99886px, 0.47779px, 0);
			transform: translate3d(-99.99886px, 0.47779px, 0);
			}
			90% {
			-webkit-transform: translate3d(-99.99886px, 0.47779px, 0);
			transform: translate3d(-99.99886px, 0.47779px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@keyframes expand_5 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-99.99886px, 0.47779px, 0);
			transform: translate3d(-99.99886px, 0.47779px, 0);
			}
			90% {
			-webkit-transform: translate3d(-99.99886px, 0.47779px, 0);
			transform: translate3d(-99.99886px, 0.47779px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes expand_6 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-71.07574px, -70.34373px, 0);
			transform: translate3d(-71.07574px, -70.34373px, 0);
			}
			90% {
			-webkit-transform: translate3d(-71.07574px, -70.34373px, 0);
			transform: translate3d(-71.07574px, -70.34373px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@keyframes expand_6 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-71.07574px, -70.34373px, 0);
			transform: translate3d(-71.07574px, -70.34373px, 0);
			}
			90% {
			-webkit-transform: translate3d(-71.07574px, -70.34373px, 0);
			transform: translate3d(-71.07574px, -70.34373px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes expand_7 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-0.55743px, -99.99845px, 0);
			transform: translate3d(-0.55743px, -99.99845px, 0);
			}
			90% {
			-webkit-transform: translate3d(-0.55743px, -99.99845px, 0);
			transform: translate3d(-0.55743px, -99.99845px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@keyframes expand_7 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(-0.55743px, -99.99845px, 0);
			transform: translate3d(-0.55743px, -99.99845px, 0);
			}
			90% {
			-webkit-transform: translate3d(-0.55743px, -99.99845px, 0);
			transform: translate3d(-0.55743px, -99.99845px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes expand_8 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(70.2871px, -71.13173px, 0);
			transform: translate3d(70.2871px, -71.13173px, 0);
			}
			90% {
			-webkit-transform: translate3d(70.2871px, -71.13173px, 0);
			transform: translate3d(70.2871px, -71.13173px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@keyframes expand_8 {
			0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			10% {
			-webkit-transform: translate3d(70.2871px, -71.13173px, 0);
			transform: translate3d(70.2871px, -71.13173px, 0);
			}
			90% {
			-webkit-transform: translate3d(70.2871px, -71.13173px, 0);
			transform: translate3d(70.2871px, -71.13173px, 0);
			}
			100% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
			}
			}
			@-webkit-keyframes spin {
			0% {
			-webkit-transform: rotateZ(0);
			transform: rotateZ(0);
			}
			25% {
			-webkit-transform: rotateZ(0);
			transform: rotateZ(0);
			}
			90% {
			-webkit-transform: rotateZ(720deg);
			transform: rotateZ(720deg);
			}
			100% {
			-webkit-transform: rotateZ(720deg);
			transform: rotateZ(720deg);
			}
			}
			@keyframes spin {
			0% {
			-webkit-transform: rotateZ(0);
			transform: rotateZ(0);
			}
			25% {
			-webkit-transform: rotateZ(0);
			transform: rotateZ(0);
			}
			90% {
			-webkit-transform: rotateZ(720deg);
			transform: rotateZ(720deg);
			}
			100% {
			-webkit-transform: rotateZ(720deg);
			transform: rotateZ(720deg);
			}
			}
			@-webkit-keyframes hue {
			0% {
			fill: #42e5ff;
			}
			3% {
			fill: #72ff7d;
			}
			33% {
			fill: #72ff7d;
			}
			36% {
			fill: #ffda72;
			}
			66% {
			fill: #ffda72;
			}
			69% {
			fill: #42e5ff;
			}
			100% {
			fill: #42e5ff;
			}
			}
			@keyframes hue {
			0% {
			fill: #42e5ff;
			}
			3% {
			fill: #72ff7d;
			}
			33% {
			fill: #72ff7d;
			}
			36% {
			fill: #ffda72;
			}
			66% {
			fill: #ffda72;
			}
			69% {
			fill: #42e5ff;
			}
			100% {
			fill: #42e5ff;
			}
			}

		</style>
		<svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
			<g>
				<circle cx="250" cy="250" r="40"/>
				<circle cx="250" cy="250" r="40"/>
				<circle cx="250" cy="250" r="40"/>
				<circle cx="250" cy="250" r="40"/>
				<circle cx="250" cy="250" r="40"/>
				<circle cx="250" cy="250" r="40"/>
				<circle cx="250" cy="250" r="40"/>
				<circle cx="250" cy="250" r="40"/>
			</g>
			<defs>
				<filter id="shadowed-goo">
					<feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
					<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
					<feGaussianBlur in="goo" stdDeviation="3" result="shadow" />
					<feColorMatrix in="shadow" mode="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 -0.2" result="shadow" />
					<feOffset in="shadow" dx="1" dy="1" result="shadow" />
					<feComposite in2="shadow" in="goo" result="goo" />
					<feComposite in2="goo" in="SourceGraphic" result="mix" />
				</filter>
				<filter id="goo">
					<feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
					<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
					<feComposite in2="goo" in="SourceGraphic" result="mix" />
				</filter>
			</defs>
		</svg>
		<?php
		return ob_get_clean();
	}
}

$Loading = new Loading();

?>
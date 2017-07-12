<?php
require_once('TripAPIException.php');
require_once('TripAPI.php');
require_once('inputData.php');

$inputArray = json_decode($inputJson, true);

try {
	$apiObj = new TripAPI( $inputArray );
	
	$boardingMessages = $apiObj->getBoardingMessages();
	
	foreach ( $boardingMessages as $index => $boardingMessage ) {
		echo ($index + 1) . ". " . $boardingMessage . "<br/>";
	}
} catch ( TripAPIException $ex ) {
	echo $ex->getMessage();
}

<?php
date_default_timezone_set('Europe/London');

class Trip extends PHPUnit_Framework_TestCase
{
	
	protected function setUp()
	{
		$inputJson = '[
				{
					"from": "Stockholm",
					"to": "New York",
					"modeOfTransport": "Flight",
					"transportNo": "SK22",
					"gateNo": "22",
					"seatNo": "7B"
				}, {
					"from": "Gerona Airport",
					"to": "Stockholm",
					"modeOfTransport": "Flight",
					"transportNo": "SK455",
					"baggage": "334",
					"gateNo": "45B",
					"seatNo": "3A"
				}, {
					"from": "Madrid",
					"to": "Barcelona",
					"modeOfTransport": "Train",
					"transportNo": "78A",
					"seatNo": "45B"
				}, {
					"from": "Barcelona",
					"to": "Gerona Airport",
					"modeOfTransport": "Bus"
				}
			]';
		$inputArray = json_decode($inputJson, true);
		$this->Trip = new TripAPI($inputArray);
		
    }
    
    /**
    *@group TripSorting First Results
    */
	public function testTripFirstSorting()
	{
		$boardingResults = $this->Trip->sortBoardingCards();
		$message = 'Madrid';
		$this->assertEquals($message, $boardingResults[0]['from']);
	}

	/**
    *@group TripSorting Last Results
    */
	public function testTripLastSorting()
	{
		$boardingResults = $this->Trip->sortBoardingCards();
		$message = 'New York';
		$this->assertEquals($message, $boardingResults[3]['to']);
	}

	/**
    *@group TripSorting Messages
    */
	public function testTripSortingMessages()
	{
		$boardingMessages = $this->Trip->getBoardingMessages();
		$message = 'Take train 78A from Madrid to Barcelona.Sit in Seat 45B.';
		$this->assertEquals($message, $boardingMessages[0]);
	}
	
}
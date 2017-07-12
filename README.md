# Trip
Transportation Boarding Card Sorting

#Steps

1) Move Trip folder to your PHP Server.

2) Run the Trip/index.php on you PHP Server.

3) You will see the results

#Json Data 
-----------

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

#Results:
--------

1) Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2) Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3) From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.
4) From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.
5) You have arrived at your final destination.

Handling Exceptions
-------------------

We are handling the Exeptions to catch the errors. We have used Try Catch Method.


#PHPUNIT
---------

PHPUNIT has written for this App. please install phpunit to run the test.

If you dont have PHPUNIT on your machine, please find the link to install PHPUNIT

https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx

To Run the test:

1) cd /Trip/phpunit
2) Run phpunit

Extend the code
----------------
1) To extend the transportion, we have used switch case in BoardingMessage.php, you just need to add one more case and the function to get the messages.

2) Add the message for new transportation.

example : Taxi

case 'Taxi' :
			$funcName = "getTaxiBoardingMessage";
			break;




<?php

/* 
	Boarding Messages
*/
class BoardingMessage{

	const FINAL_MESSAGE = "You have arrived at your final destination";
	const BUS_MESSAGE_DEFAULT = "Take the bus %s from %s to %s.";
	const AIRPORT_BUS_MESSAGE_DEFAULT = "Take the airport bus %s from %s to %s.";
	const TRAIN_MESSAGE_DEFAULT = "Take train %s from %s to %s.";
	const FLIGHT_MESSAGE_DEFAULT = "From %s, take flight %s to %s. Gate %s, Seat %s.";
	const SEAT_NOT_ASSIGNED_MESSAGE = "No seat assignment.";
	const SEAT_ASSIGNED_MESSAGE = "Sit in Seat %s.";
	const BAGGAGE_NOT_ASSIGNED_MESSAGE = "Baggage will we automatically transferred from your last leg.";
	const BAGGAGE_ASSIGNED_MESSAGE = "Baggage drop at ticket counter %s.";

	/* 
		$boardingcard Arrays
		return Messages
	*/
	public function getMessage($boardingCard){
		switch ($boardingCard ['modeOfTransport']) {
			case 'Train' :
				$funcName = "getTrainBoardingMessage";
				break;
			case 'Airport Bus' :
				$funcName = "getAirportBusBoardingMessage";
				break;
			case 'Bus' :
				$funcName = "getBusBoardingMessage";
				break;
			case 'Flight' :
				$funcName = "getFlightBoardingMessage";
				break;
			default :
				return '';
		}
		return $this->{$funcName} ( $boardingCard );
	}

	private function getBusBoardingMessage($boardingCard){
		$message = sprintf ( self::BUS_MESSAGE_DEFAULT, (! empty ( $boardingCard ['transportNo'] ) ? $boardingCard ['transportNo'] : ''), $boardingCard ['from'], $boardingCard ['to'] );
		if (! empty ( $boardingCard ['seatNo'] )) {
			$message .= sprintf ( self::SEAT_ASSIGNED_MESSAGE, $boardingCard ['seatNo'] );
		} else {
			$message .= self::SEAT_NOT_ASSIGNED_MESSAGE;
		}
		return $message;
	}

	private function getAirportBusBoardingMessage($boardingCard){
		$message = sprintf ( self::AIRPORT_BUS_MESSAGE_DEFAULT, (! empty ( $boardingCard ['transportNo'] ) ? $boardingCard ['transportNo'] : ''), $boardingCard ['from'], $boardingCard ['to'] );
		if (! empty ( $boardingCard ['seatNo'] )) {
			$message .= sprintf ( self::SEAT_ASSIGNED_MESSAGE, $boardingCard ['seatNo'] );
		} else {
			$message .= self::SEAT_NOT_ASSIGNED_MESSAGE;
		}
		return $message;
	}

	private function getTrainBoardingMessage($boardingCard){
		$message = sprintf ( self::TRAIN_MESSAGE_DEFAULT, (! empty ( $boardingCard ['transportNo'] ) ? $boardingCard ['transportNo'] : ''), $boardingCard ['from'], $boardingCard ['to'] );
		if (! empty ( $boardingCard ['seatNo'] )) {
			$message .= sprintf ( self::SEAT_ASSIGNED_MESSAGE, $boardingCard ['seatNo'] );
		} else {
			$message .= self::SEAT_NOT_ASSIGNED_MESSAGE;
		}
		return $message;
	}

	private function getFlightBoardingMessage($boardingCard){
		$message = sprintf ( self::FLIGHT_MESSAGE_DEFAULT, $boardingCard ['transportNo'], $boardingCard ['from'], $boardingCard ['to'], $boardingCard ['gateNo'], $boardingCard ['seatNo'] );
		if (! empty ( $boardingCard ['baggage'] )) {
			$message .= "\n" . sprintf ( self::BAGGAGE_ASSIGNED_MESSAGE, $boardingCard ['baggage'] );
		} else {
			$message .= "\n" . self::BAGGAGE_NOT_ASSIGNED_MESSAGE;
		}
		return $message;
	}
}

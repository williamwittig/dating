<?php

class Validation {
	// ----- VALIDATION FUNCTIONS -----
	// Name validation
	static function validName($str) {
		for ($i=0;$i<strlen($str);$i++) {
			// If any character is not alphabetic
			if (!ctype_alpha($str[$i])) {
				return FALSE;
			}
		}

		// Checking if the name is at least one letter
		return strlen(trim($str))>0;
	}

	// Age validation
	static function validAge($age) {
		// Checking if age is between 18 and 118
		return ($age>=18 && $age<=118);
	}

	// Phone number validation
	static function validPhone($phone) {
		for ($i=0;$i<strlen($phone);$i++) {
			// Checking if any character is not a digit
			if (!ctype_digit($phone[$i])) {
				return FALSE;
			}
		}

		// Ensuring that the phone number is either 7 or 10 numbers long
		return (strlen(trim($phone))==10 || strlen(trim($phone))==7);
	}

	// Email validation
	static function validEmail($email) {
		// Ensuring the email has a '@' and '.'
		return filter_var($email,FILTER_VALIDATE_EMAIL);
	}

	// Outdoor interests validation
	static function validOutdoor($outdoorInterests) {
		// If no outdoor interests were selected
		if (empty($outdoorInterests)) {
			return TRUE;
		}

		// Loops through the user choices
		foreach ($outdoorInterests as $outdoorInterest) {
			// If the choice is not in the list of valid choices
			if (!in_array($outdoorInterest, DataLayer::getOutdoorInterests())) {
				return FALSE;
			}
		}

		// Return true if no invalid values were found
		return TRUE;
	}

	// Indoor interests validation
	static function validIndoor($indoorInterests) {
		// If no indoor interests were selected
		if (empty($indoorInterests)) {
			return TRUE;
		}

		// Loops through the user choices
		foreach ($indoorInterests as $indoorInterest) {
			// If the choice is not in the list of valid choices
			if (!in_array($indoorInterest, DataLayer::getIndoorInterests())) {
				return FALSE;
			}
		}

		// Return true if no invalid values were found
		return TRUE;
	}
}
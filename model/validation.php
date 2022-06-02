<?php

/**
 * This class is used validate data input from the user
 * @author William Wittig
 * @version 1.0
 */
class Validation {
	// ----- VALIDATION FUNCTIONS -----

	/**
	 * This method validates that a valid name was input
	 * @param $str
	 * @return bool
	 */
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

	/**
	 * This method validates that a valid age was input
	 * @param $age
	 * @return bool
	 */
	static function validAge($age) {
		// Checking if age is between 18 and 118
		return ($age>=18 && $age<=118);
	}

	/**
	 * This method validates that a valid phone number was input
	 * @param $phone
	 * @return bool
	 */
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

	/**
	 * This method validates that a valid email was input
	 * @param $email
	 * @return mixed
	 */
	static function validEmail($email) {
		// Ensuring the email has a '@' and '.'
		return filter_var($email,FILTER_VALIDATE_EMAIL);
	}

	/**
	 * This method validates that valid outdoor interests were input
	 * @param $outdoorInterests
	 * @return bool
	 */
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

	/**
	 * This method validates that valid indoor interests were input
	 * @param $indoorInterests
	 * @return bool
	 */
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
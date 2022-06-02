<?php

/**
 * This class is used to hold data to be displayed on the application
 * @author William Wittig
 * @version 1.0
 */
class DataLayer
{
	private $_dbh;

	/**
	 * This method consructs a data-layer object
	 */
	function __construct()
	{
		// TODO: Move try-catch from config to data-layer
		require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');
		$dbh = 5;
		$this->_dbh = $dbh;
	}

	/**
	 * This method returns an array of genders
	 * @return string[]
	 */
	static function getGenders() {
		return array("Male", "Female", "Non-Binary");
	}

	/**
	 * This method returns an array of indoor interests
	 * @return string[]
	 */
	static function getIndoorInterests() {
		return array("TV", "Movies", "Cooking", "Board Games", "Puzzles", "Reading",
			"Playing Cards","Video Games");
	}

	/**
	 * This method returns an array of outdoor interests
	 * @return string[]
	 */
	static function getOutdoorInterests() {
		return array("Hiking", "Biking", "Swimming", "Collecting", "Walking", "Climbing");
	}

	/**
	 * This method returns an array of states
	 * @return string[]
	 */
	static function getStates() {
		return array("Alabama","Alaska","Arizona","Arkansas","California","Colorado",
			"Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois",
			"Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland",
			"Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana",
			"Nebraska","New Hampshire","New Jersey","New Mexico","New York",
			"North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania",
			"Rhode Island","South Carolina","South Dakota","Tennessee","Texas",
			"Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin",
			"Wyoming");
	}
}

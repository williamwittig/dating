<?php

/**
 * This class creates a Member object
 * @author William Wittig
 * @version 1.0
 */
class Member
{
	private $_fname;
	private $_lname;
	private $_gender;
	private $_phone;
	private $_email;
	private $_state;
	private $_seeking;
	private $_bio;
	private $_age;

	/**
	 * This method constructs a member object
	 * @param string $fname first name
	 * @param string $lname last name
	 * @param int $age the age of the user
	 * @param string $gender the gender of the user
	 * @param string $phone phone number
	 */
	public function __construct(string $fname, string $lname, int $age, string $gender,
		string $phone)
	{
		$this->_fname = $fname;
		$this->_lname = $lname;
		$this->_age = $age;
		$this->_gender = $gender;
		$this->_phone = $phone;
	}

	/**
	 * Returns the first name of the user
	 * @return String first name
	 */
	public function getFname(): string
	{
		return $this->_fname;
	}

	/**
	 * Sets the first name of the user
	 * @param String $fname first name
	 */
	public function setFname(string $fname): void
	{
		$this->_fname=$fname;
	}

	/**
	 * Returns the last name of the user
	 * @return String last name
	 */
	public function getLname(): string
	{
		return $this->_lname;
	}

	/**
	 * Sets the last name of the user
	 * @param String $lname last name
	 */
	public function setLname(string $lname): void
	{
		$this->_lname=$lname;
	}

	/**
	 * Returns the gender input from the user
	 * @return String gender
	 */
	public function getGender(): string
	{
		return $this->_gender;
	}

	/** Sets the gender of the user to the input
	 * @param String $gender
	 */
	public function setGender(string $gender): void
	{
		$this->_gender=$gender;
	}

	/**
	 * Returns the phone number of the user
	 * @return String phone number
	 */
	public function getPhone(): string
	{
		return $this->_phone;
	}

	/**
	 * Sets the phone number of the user
	 * @param String $phone
	 */
	public function setPhone(string $phone): void
	{
		$this->_phone=$phone;
	}

	/**
	 * Returns the email of the user
	 * @return String email
	 */
	public function getEmail(): string
	{
		return $this->_email;
	}

	/**
	 * Set the email of the user to the input
	 * @param String $email
	 */
	public function setEmail(string $email): void
	{
		$this->_email=$email;
	}

	/**
	 * Returns the state of the user
	 * @return String state
	 */
	public function getState(): string
	{
		return $this->_state;
	}

	/**
	 * Sets the state of the user
	 * @param String $state
	 */
	public function setState(string $state): void
	{
		$this->_state=$state;
	}

	/**
	 * Returns the seeking choices of the user
	 * @return String seeking choices
	 */
	public function getSeeking(): string
	{
		return $this->_seeking;
	}

	/**
	 * Sets the seeking choices of the user
	 * @param String $seeking
	 */
	public function setSeeking(string $seeking): void
	{
		$this->_seeking=$seeking;
	}

	/**
	 * Returns the bio of the user
	 * @return String bio
	 */
	public function getBio(): string
	{
		return $this->_bio;
	}

	/**
	 * Set the bio of the user
	 * @param String $bio
	 */
	public function setBio(string $bio): void
	{
		$this->_bio=$bio;
	}

	/**
	 * Returns the age of the user
	 * @return int age
	 */
	public function getAge(): int
	{
		return $this->_age;
	}

	/**
	 * Sets the age of the user
	 * @param int $age
	 */
	public function setAge(int $age): void
	{
		$this->_age=$age;
	}
}

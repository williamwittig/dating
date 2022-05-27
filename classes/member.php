<?php

class Member {
	private $_fname;
	private $_lname;
	private $_gender;
	private $_phone;
	private $_email;
	private $_state;
	private $_seeking;
	private $_bio;
	private $_age;

	public function __construct($fname, $lname, $age, $gender, $phone) {
		$this->_fname = $fname;
		$this->_lname = $lname;
		$this->_age = $age;
		$this->_gender = $gender;
		$this->_phone = $phone;
	}

	/**
	 * @return String
	 */
	public function getFname(): string {
		return $this->_fname;
	}

	/**
	 * @param String $fname
	 */
	public function setFname(string $fname): void {
		$this->_fname=$fname;
	}

	/**
	 * @return String
	 */
	public function getLname(): string {
		return $this->_lname;
	}

	/**
	 * @param String $lname
	 */
	public function setLname(string $lname): void {
		$this->_lname=$lname;
	}

	/**
	 * @return String
	 */
	public function getGender(): string {
		return $this->_gender;
	}

	/**
	 * @param String $gender
	 */
	public function setGender(string $gender): void {
		$this->_gender=$gender;
	}

	/**
	 * @return String
	 */
	public function getPhone(): string {
		return $this->_phone;
	}

	/**
	 * @param String $phone
	 */
	public function setPhone(string $phone): void {
		$this->_phone=$phone;
	}

	/**
	 * @return String
	 */
	public function getEmail(): string {
		return $this->_email;
	}

	/**
	 * @param String $email
	 */
	public function setEmail(string $email): void {
		$this->_email=$email;
	}

	/**
	 * @return String
	 */
	public function getState(): string {
		return $this->_state;
	}

	/**
	 * @param String $state
	 */
	public function setState(string $state): void {
		$this->_state=$state;
	}

	/**
	 * @return String
	 */
	public function getSeeking(): string {
		return $this->_seeking;
	}

	/**
	 * @param String $seeking
	 */
	public function setSeeking(string $seeking): void {
		$this->_seeking=$seeking;
	}

	/**
	 * @return String
	 */
	public function getBio(): string {
		return $this->_bio;
	}

	/**
	 * @param String $bio
	 */
	public function setBio(string $bio): void {
		$this->_bio=$bio;
	}

	/**
	 * @return int
	 */
	public function getAge(): int {
		return $this->_age;
	}

	/**
	 * @param int $age
	 */
	public function setAge(int $age): void {
		$this->_age=$age;
	}
}

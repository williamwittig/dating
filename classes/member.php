<?php

class Member {
	private $fname;
	private $lname;
	private $gender;
	private $phone;
	private $email;
	private $state;
	private $seeking;
	private $bio;
	private $age;

	public function __construct(String $fname, $lname, $age, $gender, $phone) {
		$this->$fname = "";
		$this->$lname = "";
		$this->$age = -1;
		$this->$gender = "";
		$this->$phone = "";
	}

	/**
	 * @return String
	 */
	public function getFname(): string {
		return $this->fname;
	}

	/**
	 * @param String $fname
	 */
	public function setFname(string $fname): void {
		$this->fname=$fname;
	}

	/**
	 * @return String
	 */
	public function getLname(): string {
		return $this->lname;
	}

	/**
	 * @param String $lname
	 */
	public function setLname(string $lname): void {
		$this->lname=$lname;
	}

	/**
	 * @return String
	 */
	public function getGender(): string {
		return $this->gender;
	}

	/**
	 * @param String $gender
	 */
	public function setGender(string $gender): void {
		$this->gender=$gender;
	}

	/**
	 * @return String
	 */
	public function getPhone(): string {
		return $this->phone;
	}

	/**
	 * @param String $phone
	 */
	public function setPhone(string $phone): void {
		$this->phone=$phone;
	}

	/**
	 * @return String
	 */
	public function getEmail(): string {
		return $this->email;
	}

	/**
	 * @param String $email
	 */
	public function setEmail(string $email): void {
		$this->email=$email;
	}

	/**
	 * @return String
	 */
	public function getState(): string {
		return $this->state;
	}

	/**
	 * @param String $state
	 */
	public function setState(string $state): void {
		$this->state=$state;
	}

	/**
	 * @return String
	 */
	public function getSeeking(): string {
		return $this->seeking;
	}

	/**
	 * @param String $seeking
	 */
	public function setSeeking(string $seeking): void {
		$this->seeking=$seeking;
	}

	/**
	 * @return String
	 */
	public function getBio(): string {
		return $this->bio;
	}

	/**
	 * @param String $bio
	 */
	public function setBio(string $bio): void {
		$this->bio=$bio;
	}

	/**
	 * @return int
	 */
	public function getAge(): int {
		return $this->age;
	}

	/**
	 * @param int $age
	 */
	public function setAge(int $age): void {
		$this->age=$age;
	}


}

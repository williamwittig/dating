<?php

class PremiumMember extends Member {
	private $_inDoorInterests;
	private $_outDoorInterests;
	private $_profilePhoto;

	public function __construct($inDoorInterests, $outDoorInterests) {
		$this->_inDoorInterests = $inDoorInterests;
		$this->_outDoorInterests = $outDoorInterests;
	}

	/**
	 * @return array
	 */
	public function getInDoorInterests(): array {
		return $this->_inDoorInterests;
	}

	/**
	 * @param array $inDoorInterests
	 */
	public function setInDoorInterests(array $inDoorInterests): void {
		$this->_inDoorInterests=$inDoorInterests;
	}

	/**
	 * @return array
	 */
	public function getOutDoorInterests(): array {
		return $this->_outDoorInterests;
	}

	/**
	 * @param array $outDoorInterests
	 */
	public function setOutDoorInterests(array $outDoorInterests): void {
		$this->_outDoorInterests=$outDoorInterests;
	}

	/**
	 * @return String
	 */
	public function getProfilePhoto(): string {
		return $this->_profilePhoto;
	}

	/**
	 * @param String $profilePhoto
	 */
	public function setProfilePhoto($profilePhoto): void {
		$this->_profilePhoto=$profilePhoto;
	}
}
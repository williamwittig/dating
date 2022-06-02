<?php

/**
 * This class creates a Premium Member object
 * @author William Wittig
 * @version 1.0
 */
class PremiumMember extends Member
{
	private $_inDoorInterests = [];
	private $_outDoorInterests = [];
	private $_profilePhoto;

	/**
	 * This method constructs a premium member object
	 * @param array $inDoorInterests Indoor interests of the user
	 * @param array $outDoorInterests Outdoor interests of the user
	 */
	public function __construct(array $inDoorInterests, array $outDoorInterests)
	{
		$this->_inDoorInterests = $inDoorInterests;
		$this->_outDoorInterests = $outDoorInterests;
	}

	/**
	 * Returns the indoor interests of the user
	 * @return array inDoorInterests
	 */
	public function getInDoorInterests(): array
	{
		return $this->_inDoorInterests;
	}

	/**
	 * Sets the indoor interests of the user
	 * @param array inDoorInterests
	 */
	public function setInDoorInterests(array $inDoorInterests): void
	{
		$this->_inDoorInterests=$inDoorInterests;
	}

	/**
	 * Returns the outdoor interests of the user
	 * @return array outDoorInterests
	 */
	public function getOutDoorInterests(): array
	{
		return $this->_outDoorInterests;
	}

	/**
	 * Sets the outdoor interests of the user
	 * @param array outDoorInterests
	 */
	public function setOutDoorInterests(array $outDoorInterests): void
	{
		$this->_outDoorInterests=$outDoorInterests;
	}

	/**
	 * Returns the profile image of the user
	 * @return String profilePhoto
	 */
	public function getProfilePhoto(): string
	{
		return $this->_profilePhoto;
	}

	/**
	 * Sets the profile image for the user
	 * @param String $profilePhoto
	 */
	public function setProfilePhoto($profilePhoto): void
	{
		$this->_profilePhoto=$profilePhoto;
	}
}
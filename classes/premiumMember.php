<?php

class PremiumMember extends Member {
	private $inDoorInterests;
	private $outDoorInterests;

	public function __construct($inDoorInterests, $outDoorInterests) {
		$this->inDoorInterests = $inDoorInterests;
		$this->outDoorInterests = $outDoorInterests;
	}

	/**
	 * @return array
	 */
	public function getInDoorInterests(): array {
		return $this->inDoorInterests;
	}

	/**
	 * @param array $inDoorInterests
	 */
	public function setInDoorInterests(array $inDoorInterests): void {
		$this->inDoorInterests=$inDoorInterests;
	}

	/**
	 * @return array
	 */
	public function getOutDoorInterests(): array {
		return $this->outDoorInterests;
	}

	/**
	 * @param array $outDoorInterests
	 */
	public function setOutDoorInterests(array $outDoorInterests): void {
		$this->outDoorInterests=$outDoorInterests;
	}


}
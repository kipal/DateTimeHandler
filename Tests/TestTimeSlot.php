<?php
/**
 * Copyright 2015 Nándor Kiss. All rights reserved.
 * Use of this source code is governed by a MIT-style
 * license that can be found in the LICENSE file.
 */

require_once '../TimeSlot.php';

class TestTimeSlot implements TimeSlot
{
	private $startDate = null;

	private $endDate   = null;

	public function __construct(DateTime $startDate, DateTime $endDate)
	{
		$this->startDate = $startDate;
		$this->endDate   = $endDate;
	}

	public function getStartDate()
	{

		return $this->startDate;
	}

	public function getEndDate()
	{

		return $this->endDate;
	}
}
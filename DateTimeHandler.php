<?php
/**
 * Copyright 2015 Nándor Kiss. All rights reserved.
 * Use of this source code is governed by a MIT-style
 * license that can be found in the LICENSE file.
 */

class DateTimeHandler
{
	/**
	 * It can show if two timeslot overlap each other.
	 *
	 * @param TimeSlot $first
	 * @param TimeSlot $second
	 *
	 * @return boolean
	 */
	public static function isOverlap(TimeSlot $first, TimeSlot $second)
	{

		return !($first->getStartDate() > $second->getEndDate()) && !($first->getEndDate() < $second->getStartDate());
	}
}
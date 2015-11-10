<?php
/**
 * Copyright 2015 Nándor Kiss. All rights reserved.
 * Use of this source code is governed by a MIT-style
 * license that can be found in the LICENSE file.
 */

require_once 'PHPUnit/Framework/TestCase.php';
require_once '../DateTimeHandler.php';
require_once '../TimeSlot.php';
require_once '../TestTimeSlot.php';

/**
 * DateTimeHandler test case.
 */
class DateTimeHandlerTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @dataProvider overlapsTrue
	 */
	public function testOverlapTrue(TimeSlot $first, TimeSlot $second)
	{
		$this->assertTrue(DateTimeHandler::isOverlap($first, $second));
	}

	public function overlapsTrue()
	{

		return array(
			array(
				new TestTimeSlot(new DateTime("2015-11-10 22:31"), new DateTime("2015-11-10 22:51")),
				new TestTimeSlot(new DateTime("2015-11-10 22:32"), new DateTime("2015-11-10 22:50")),
			),
			array(
				new TestTimeSlot(new DateTime("2015-11-10 22:31"), new DateTime("2015-11-10 22:51")),
				new TestTimeSlot(new DateTime("2015-11-10 22:30"), new DateTime("2015-11-10 22:50")),
			),
			array(
				new TestTimeSlot(new DateTime("2015-11-10 22:31"), new DateTime("2015-11-10 22:51")),
				new TestTimeSlot(new DateTime("2015-11-10 22:32"), new DateTime("2015-11-10 22:55")),
			),
		);
	}

	/**
	 * @dataProvider overlapsFalse
	 */
	public function testOverlapFalse(TimeSlot $first, TimeSlot $second)
	{
		$this->assertFalse(DateTimeHandler::isOverlap($first, $second));
	}

	public function overlapsFalse()
	{

		return array(
			array(
				new TestTimeSlot(new DateTime("2015-11-10 22:31"), new DateTime("2015-11-10 22:51")),
				new TestTimeSlot(new DateTime("2015-11-10 22:20"), new DateTime("2015-11-10 22:30")),
			),
			array(
				new TestTimeSlot(new DateTime("2015-11-10 22:31"), new DateTime("2015-11-10 22:51")),
				new TestTimeSlot(new DateTime("2015-11-10 22:52"), new DateTime("2015-11-10 22:53")),
			),
			array(
				new TestTimeSlot(new DateTime("2015-11-10 22:31:00"), new DateTime("2015-11-10 22:51:00")),
				new TestTimeSlot(new DateTime("2015-11-10 22:51:01"), new DateTime("2015-11-10 22:51:02")),
			),
		);
	}
}


<?php
/*
* @Author: mark
* @Date:   2014-05-07 14:19:04
* @Last Modified by:   mark
* @Last Modified time: 2014-05-07 15:24:42
*/

namespace Bearlikelion\TwigTimeTools;

/** @class Time Twig extension */
class Time extends \Twig_Extension
{
	/**
	 * Define Twig filters
	 * @return array
	 */
	public function getFilters()
	{
		return array(
			new \Twig_SimpleFilter('ago', array($this, 'elapsedTime')),
		);
	}

	/**
	 * Converts a timestamp to time ago
	 * @param  integer $time
	 * @return string
	 */
	public function elapsedTime($time)
	{
		if (is_string($time)) $time = strtotime($time);

		$etime = time() - $time;

		if ($etime < 1) return 'Just Now';

		$a = [
			12 * 30 * 24 * 60 * 60  =>  'year',
			30 * 24 * 60 * 60       =>  'month',
			24 * 60 * 60            =>  'day',
			60 * 60                 =>  'hour',
			60                      =>  'minute',
			1                       =>  'second'
		];

		foreach ($a as $secs => $str) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round($d);
				return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
			}
		}
	}

	/** Extension name */
	public function getName()
	{
		return 'time_extension';
	}
}

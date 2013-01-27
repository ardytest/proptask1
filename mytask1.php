#!/usr/bin/php
<?php
class MyTask1
{
	private $start;
	private $end;

	const FIZZ = 'Fizz';
	const BUZZ = 'Buzz';
	const BAZZ = 'Bazz';

	public function __construct($start, $end)
	{
		$this->start = $start;
		$this->end = $end;
	}

	/**
	 * "Fizz" if a multiple of 3
	 * "Buzz" if a multiple of 5
	 *  The integer itself otherwise.
	 *
	 * @return Array
	 */
	public function generateOutput()
	{
		for($i = $this->start; $i <= $this->end; $i++) {

			$str = (($i % 3) == 0) ? self::FIZZ : '';
			$str .= (($i % 5) == 0) ? self::BUZZ : '';

			$minus_1 = $i - 1;
			$minus_2 = $i - 2;

			$str = ((($minus_1 % 3) == 0 || ($minus_1 % 5) == 0)
					&& (($minus_2 % 3) == 0 || ($minus_2 % 5) == 0))
					? self::BAZZ : $str;

			$output_array[] = ($str) ? $str : $i;
		}

		return $output_array;
	}
}

$args = getopt('r:');
$range = explode(',', $args['r']);

$task = new MyTask1($range[0], $range[1]);
$output = $task->generateOutput();

echo implode(' ' ,$output);
echo PHP_EOL;

/**
 * End of file mytask1.php
 */
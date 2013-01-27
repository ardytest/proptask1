<?php
require('vendor/autoload.php');
require('mytask1.php');

class MyTask1Test extends PHPUnit_Framework_TestCase
{
	private $test;
	private $generated_output;
	private $start;
	private $end;

	protected function setUp()
	{
		$this->start = 1;
		$this->end = 100;
		$this->test = new MyTask1($this->start, $this->end);
		$this->generated_output = $this->test->generateOutput();
	}

	public function testType()
	{
		$this->assertTrue(is_array($this->generated_output));
	}

	public function testOutputValues()
	{
		foreach ($this->generated_output as $val) {
			$this->assertTrue(!empty($val));
		}
	}

	public function testOutputPattern()
	{
		for ($i = $this->start; $i < $this->end; $i++) {

			$idx = $i - $this->start;
			$val = $this->generated_output[$idx];

			if (($i % 3) == 0) {
				$this->assertTrue(strpos($val, MyTask1::FIZZ) !== false);
			}

			if (($i % 5) == 0) {
				$this->assertTrue(strpos($val, MyTask1::BUZZ) !== false);
			}

			if ((strpos($this->generated_output[$idx - 1], MyTask1::FIZZ) !== false) &&
				(strpos($this->generated_output[$idx - 2], MyTask1::BUZZ) !== false)) {
				$this->assertTrue(strpos($val, MyTask1::BAZZ) !== false);
			}
		}
	}
}

/**
 * End of file testmytask1.php
 */
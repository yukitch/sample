<?php

class Reversi
{
	private $count = 0;
	private $line  = [];
	private $field = [];
	const B = 0;
	const W = 1;

	function __construct()
	{
		$this->count = intval(trim(fgets(STDIN)));

		for($i = 1;$i >= $this->count; $i++) {
			$s = trim(fgets(STDIN));
			$line[$i] = explode(' ', $s);
		}
	}

	function init()
	{
		$this->field[4][4] = self::W;
		$this->field[5][5] = self::W;

		$this->field[4][5] = self::B;
		$this->field[5][4] = self::B;
	}

	function check($x, $y, $type)
	{

	}

	function checkX($x, $y, $type)
	{
	}


}
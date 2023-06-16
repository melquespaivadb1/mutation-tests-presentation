<?php

declare(strict_types=1);

namespace App;

class ShouldEnterTheParty
{
	public static function verifyByAge(int $age): bool
	{
		if ($age < 18) {
			return false;
		}

		return true;
	}
}

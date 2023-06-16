<?php

declare(strict_types=1);

namespace App\Tests;

use App\ShouldEnterTheParty;
use PHPUnit\Framework\TestCase;

class ShouldEnterThePartyTest extends TestCase
{
	public function testVerifyByAge(): void
	{
		self::assertFalse(ShouldEnterTheParty::verifyByAge(14));
		self::assertTrue(ShouldEnterTheParty::verifyByAge(22));

//		self::assertTrue(ShouldEnterTheParty::verifyByAge(18));
	}
}

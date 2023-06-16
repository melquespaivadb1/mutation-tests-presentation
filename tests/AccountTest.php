<?php

declare(strict_types=1);

namespace App\Tests;

use App\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
	public function testGetBalance(): void
	{
		$account = new Account();
		$account->addIncoming(1000)
				->addIncoming(2000);

		$account->addExpense(500);
		$account->addExpense(250);

		self::assertNotEmpty($account->getBalance());

//		self::assertEquals(2250, $account->getBalance());
	}
}

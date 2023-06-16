<?php

declare(strict_types=1);

namespace App;

class Account
{
	private array $incoming = [];
	private array $expenses = [];

	public function addIncoming(float $incomingValue): self
	{
		$this->incoming[] = $incomingValue;
		return $this;
	}

	public function addExpense(float $expenseValue): self
	{
		$this->expenses[] = $expenseValue;
		return $this;
	}

	public function getBalance(): float
	{
		$incomingSum = array_reduce($this->incoming, fn($val, $incoming) => $val += $incoming);
		$expenseSum = array_reduce($this->expenses, fn($val, $expense) => $val += $expense);

		return $incomingSum - $expenseSum;
	}
}
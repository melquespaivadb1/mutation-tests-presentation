<?php

namespace App;

class CreateUser
{
	private array $userList = [];
	private string $message = '';

	public function createUser(string $name, string $password): self
	{
		$this->validateUserParamsOrCry($name, $password);
		$this->validateUserName($name);
		$this->validateUserPassword($password);

		$this->userList[] = (object)[
			'name' => $name,
			'password' => $password,
		];

		$this->message = 'Usuário salvo com sucesso';
		return $this;
	}

	public function getMessage(): string
	{
		return $this->message;
	}

	private function validateUserParamsOrCry(string $name, string $password): void
	{
		if (empty($name) || empty($password)) {
			throw new \InvalidArgumentException('Informe o nome e a senha do usuário');
		}
	}

	private function validateUserName(string $name): void
	{
		if (strlen($name) > 15) {
			throw new \InvalidArgumentException('O máximo de caracteres para o nome é 15');
		}
	}

	private function validateUserPassword(string $password): void
	{
		if (strlen($password) > 10) {
			throw new \InvalidArgumentException('O máximo de caracteres para a senha é 10');
		}
	}
}
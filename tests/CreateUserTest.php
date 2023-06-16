<?php

namespace App\Tests;

use App\CreateUser;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CreateUserTest extends TestCase
{
	public static function provideInvalidNameAndPassword(): iterable
	{
		yield [
			'',
			'123456',
			'Informe o nome e a senha do usuário'
		];
		yield [
			'Melques',
			'',
			'Informe o nome e a senha do usuário'
		];
		yield [
			'',
			'',
			'Informe o nome e a senha do usuário'
		];
		yield [
			'Melques',
			'12345678900000',
			'O máximo de caracteres para a senha é 10'
		];
		yield [
			'Melques Santos Paiva Fernandes Novaes',
			'123456',
			'O máximo de caracteres para o nome é 15'
		];
	}

	/** @dataProvider provideInvalidNameAndPassword */
	public function testCreateUser_ShouldThrowInvalidArgumentException(string $name, string $password, string $expectedExceptionMessage): void
	{
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage($expectedExceptionMessage);

		$createUser = new CreateUser();
		$createUser->createUser($name, $password);
	}

	public static function provideSuccessfulUserInformation(): iterable
	{
		yield ['Melques', '123'];

//		yield ['Melques Paiva..', '123'];
//		yield ['Melques', '1234567890'];
	}

	/** @dataProvider provideSuccessfulUserInformation */
	public function testCreateUser_ShouldBeSuccessful(string $name, string $password): void
	{
		$createUser = new CreateUser();
		$this->assertEquals('Usuário salvo com sucesso', $createUser->createUser($name, $password)->getMessage());
	}
}

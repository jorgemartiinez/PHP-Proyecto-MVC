<?php

namespace cursophp7\app\entity;

use cursophp7\core\database\IEntity;


class Usuario implements IEntity
{
	private $id;
	private $username;
	private $password;
	private $role;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return self
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username
	 *
	 * @return self
	 */
	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 *
	 * @return self
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * @param mixed $role
	 *
	 * @return self
	 */
	public function setRole($role)
	{
		$this->role = $role;

		return $this;
	}

	public function toArray() : array
	{
		return [
			'id' => $this->getId(),
			'username' => $this->getUsername(),
			'role' => $this->getRole(),

		];
	}

}
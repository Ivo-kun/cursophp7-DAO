<?php

class Sql extends PDO
{
	private $conn;



	public function __construct()
	{
		$this->conn = new PDO ("mysql:host=localhost; dbname=dbphp7", "root", "");
	}




	private function setParams($statement, $params = array())
	{
		foreach($statement as $key => $value)
		{
			$this->setParam($key, $value);
		}
	}




	private function setParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}





	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;
	}




	public function select($rawQuery):array
	{
		$stmt = $this->query($rawQuery);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function delete($rawQuery, $params = array())
	{
		$stmt = $this->query($rawQuery, $params);
		return "Usuário deletado! Bye-Bye!";
	}

	public function insert($rawQuery, $params = array())
	{
		$stmt = $this->query($rawQuery, $params);
		return "Usuário cadastrado! Seja bem-vindo!";
	}
}

?>
<?php

class Usuario
{
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario()
	{
		return $this->idusuario;
	}

	public function setIdusuario($value)
	{
		$this->idusuario = $value;
	}

	public function getDeslogin()
	{
		return $this->deslogin;
	}

	public function setDeslogin($value)
	{
		$this->deslogin = $value;
	}

	public function getDessenha()
	{
		return $this->dessenha;
	}

	public function setDessenha($value)
	{
		$this->dessenha = $value;
	}

	public function getDtcadastro()
	{
		return $this->dtcadastro;
	}

	public function setDtcadastro($value)
	{
		$this->dtcadastro = $value;
	}

	public function listarId($id)
	{
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
								":ID"=> $id));

		if ($results[0])
		{
			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	/*public function listAll()
	{
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

		foreach ($results as $row)
		{
			foreach($row as $key => $value)
			{
				echo "<strong>" . $key . ": </strong>" . $value . "<br>";
			}

			echo "##################################################<br>";
		}
	}*/



	//Como neste método não se utiliza a palavra "$this", pode ser estático.
	//Na prática, quando este método for invocado na index, não será preciso
	//instanciar um objeto desta classe (Usuario).
	public static function listAll()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}



	//busca usuário por deslogin
	public static function srcLogin($src)
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SRC ORDER BY deslogin", array(
							'SRC'=>"%".$src."%"
		));

	}



	public function __toString()
	{
		return json_encode(array("idusuario" => $this->getIdusuario(),
								 "deslogin" => $this->getDeslogin(),
								 "dessesnha" => $this->getDessenha(),
								 "dtcadastro" => $this->getDtcadastro()->format("d/m/Y H:i:s")
							));
	}

	
}

?>
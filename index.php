<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->insert("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (Ivo-sama-chan, japa21)");

$usuarios = $sql->insert("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (Regina, pet7)");

//echo $sql->delete("DELETE FROM tb_usuarios WHERE idusuario = 5");

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);

?>
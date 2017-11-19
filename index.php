<?php

require_once("config.php");

/*Busca usuário por idusuario
$root = new Usuario();
$root->listarId(1);
echo $root;*/

//lista todos os usuarios
//$root = Usuario::listAll();
//echo json_encode($root);

//Busca usuário por deslogin
$src = Usuario::srcLogin("rina");
echo json_encode($src);

?>
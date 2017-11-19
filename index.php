<?php

require_once("config.php");

$root = new Usuario();
$root->listarId(1);
echo $root;
?>
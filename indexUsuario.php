<?php
include('functions.php');

$usuarios = carregaUsuarios();


foreach ($usuarios as $usuario) {
  $_GET['usuario'] = $usuario['usuario'];
  echo $usuario['nome'];
  echo $usuario['email'];
  echo $usuario['senha'];
  }

?>

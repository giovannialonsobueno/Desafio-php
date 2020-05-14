<?php
include('functions.php');

session_start();
if ($_SESSION) {
header('location: createUsuario.php');
}

$loginOk = true;
$email= '';
if($_POST){
  $login= $_POST['login'];
  $senha = $_POST['senha'];
  $usuarios = carregaUsuarios();
  foreach($usuarios as $usuario){
    if( ($usuario['email'] || $usuario['nome']) == $login && $usuario['senha'] == password_verify($senha,$usuario['senha'])){
      $_SESSION['usuario'] = $usuario['usuario'];
      header('location: home.php');
    } else {
      $loginOk = false;
    }
  }
}
?>

<p>a senha é 123456</p>
<form class="" action="" method="post">
  <label for="">Digite seu e-mail</label>
  <input type="text" name="login" value="">

  <label for="">Digite sua senha</label>
  <input type="password" name="senha" value="">
  <?=($loginOk ? '' : '<span class="erro">Email, nome ou senha inválidos</span>'.'<br>'); ?>

  <button type="submit" name="button">Enviar</button>
</form>

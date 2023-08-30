<?php
session_start();
include_once 'conexao.php';
$id = $_GET['id'];

$novo_nome = $_POST['nome_atualiza'];
$novo_email = $_POST['email_atualiza'];
$novo_telefone = $_POST['tele_atualiza'];

$sql = "UPDATE usuarios SET nome = '{$novo_nome}', email = '$novo_email', telefone = '$novo_telefone' WHERE id =". $id. "";

if(mysqli_query($link, $sql)){

	$_SESSION['msg'] = "<div class='row'><div class='col s12 m4 push-m4'><div class='card-panel yellow darken-1'><span class='yellow-text text-lighten-4'>Alterado com sucesso!!</span></div></div></div>";
	header("Location: adms.php");
} else{
	$_SESSION['msg'] = "<div class='row'><div class='col s12 m4 push-m4'><div class='card-panel red darken-1'><span class='yellow-text text-lighten-4'>[ERRO] - Ocorreu algum erro :(<br>Não foi possivel !atualizar!</span></div></div></div>";
	header("Location: adms.php");
}
?>
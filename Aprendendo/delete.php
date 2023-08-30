<?php
session_start();
include_once 'conexao.php';

$id = $_GET['id2'];

$sql = "DELETE FROM usuarios WHERE id = '$id'";


if(mysqli_query($link, $sql)){
	$_SESSION['msg'] = "<div class='row'><div class='col s12 m4 push-m4'><div class='card-panel yellow darken-2'><h5 class='white-text'>Usuario deletado com sucesso.</h5></div></div></div>";
	header("Location: adms.php");
}
?>
<?php
session_start();
include_once('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";;
$faz_verifica_email = mysqli_query($link, $verifica_email);

if(mysqli_num_rows($faz_verifica_email)>0){
	$_SESSION['msg'] = "<div class='row'><div class='col s12 m4 push-m4'><div class='card-panel red darken-1'><span class='red-text text-lighten-4'>[ERRO] - Email Ja esta em uso.</span></div></div></div>";
	header("Location: cadastrar.php");
} else{
	$inserir = "INSERT INTO usuarios (id, nome, email, telefone) VALUES(NULL,'" .$nome. "','" .$email. "','" .$telefone. "')";
	//$inserir = "INSERT INTO usuarios (id, nome, email, telefone) VALUES(NULL, '$nome', '$email', '$telefone')";

	if(mysqli_query($link, $inserir)){
		$_SESSION['msg'] = "<div class='row'><div class='col s12 m4 push-m4'><div class='card-panel yellow darken-1'><span class='yellow-text text-lighten-4'>	Cadastrado com sucesso.</span></div></div></div>";
		header("Location: adms.php");
	} else{
		$_SESSION['msg'] = "<div class='row'><div class='col s12 m4 push-m4'><div class='card-panel red darken-1'><span class='red-text text-lighten-4'>[ERRO] - Não foi possivel realizar o cadastro.</span></div></div></div>";
		header("Location: adms.php");
	}
}

?>
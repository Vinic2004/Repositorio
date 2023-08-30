<?php
session_start();
include_once 'conexao.php';

$id2 = $_GET['id2'];

$consulta = mysqli_query($link, "SELECT * FROM usuarios WHERE id = '$id2'");
$row = mysqli_fetch_array($consulta);

$_SESSION['delete'] ="<div class='total'><div class='meio'><div class='card-panel red darken-3'><h5 class='white-text' style='font-size: 18px;'> Deseja mesmo deletar? </h5><h5 class='white-text'>" . $row['nome'] . "</h5><div class='row'><div class='col s6'><a href='delete.php?id2=" . $row['id'] . "' class='btn red lighten-2'><i class='material-icons left small'>delete</i>Deletar</a></div><div class='col s6'><a class='btn' href='adms.php'><i class='material-icons left small'>cancel</i> Cancelar</a></div></div></div></div></div>";

header("Location: adms.php");
?>
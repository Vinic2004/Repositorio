<?php
session_start();
include_once ('conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="MATERIALIZE-CSS/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body background="714660.png">

<header>
	<nav class="green lighten-1">
    	<div class="nav-wrapper container">
     		 <a href="#"><img alt="" class="circle responsive-img" src="dogo-argentino.png"></a>
      			<ul class="right">
        			<li class="active"><a href="index.php"><i class="material-icons left">contacts</i>Consultar</a></li>
        			<li><a href="cadastrar.php"><i class="material-icons left">add_box</i>Cadastrar</a></li>
      			</ul>
    	</div>
  </nav> 	
</header>

<div class="container">
	<div class="card-panel">
		<i class="material-icons left large">dashboard</i><h2>Listagem de usuarios</h2>
	</div>
</div>

<div class="row container">
	<div class="card-panel">
		<table class="striped highlight">
    	<thead>
    		<tr>
    			<td>
    				<h5>#</h5>
    			</td>

    			<td>
	    			<h5>Nome</h5>
    			</td>

	    		<td>
    				<h5>Email</h5>
    			</td>

	    		<td>
    				<h5>Telefone</h5>
    			</td>

    			
    		</tr>
    	</thead>
    	
		<tbody>
			<?php

			$consulta = mysqli_query($link, "SELECT * FROM usuarios");
			while ($row = mysqli_fetch_array($consulta)) {
				echo "<tr><td>";
				echo $row['id'];
				echo "</td>";

				echo "<td>";
				echo $row['nome'];
				echo "</td>";

				echo "<td>";
				echo $row['email'];
				echo "</td>";

				echo "<td>";
				echo $row['telefone'];
				echo "</td>";

				echo "<td width='30px'>";
    			echo "<a href='edit.php?id=".$row['id'] ."'><i class='material-icons left small light-blue-text text-lighten-2'>edit</i>";
    			echo "</td>";

    			echo "<td width='30px'>";
    			echo "<a href='delete.php?id=".$row['id'] ."'><i class='material-icons left small red-text text-lighten-2'>delete</i></a>";
    			echo "</td></tr>";
			}

			?>
		</tbody>	
    	</table>
	</div>
</div>

</body>
</html>
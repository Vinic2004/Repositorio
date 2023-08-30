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
	<link rel="stylesheet" href="meus_estilos.css">
</head>

<body background="714660.png">

 <!---->



<header>
	<nav class="green lighten-1">
    	<div class="nav-wrapper container">
     		 <a href="#"><img alt="" class="circle responsive-img" src="dogo-argentino.png"></a>
      			<ul class="right">
        			<li class="active">
        				<a href="adms.php"><i class="material-icons left">contacts</i>Consultar</a></li>

        			<li><a href="cadastrar.php">
        				<i class="material-icons left">add_box</i>Cadastrar</a></li>

        			<li><a href="index.php"><i class="material-icons left">logout</i></a></li>
      			</ul>
    	</div>
  </nav> 	
</header>
<main>

<?php
if(isset($_SESSION['delete'])){
	echo $_SESSION['delete'];
}
unset($_SESSION['delete']);


@$valor = $_GET['id2'];

if($valor > 0){
	$array = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM usuarios WHERE id = '$valor'"));

	$nome     = $array['nome'];
	$email    = $array['email'];
	$telefone = $array['telefone'];
?>
	<div class="total">
	<div class="meio">

		<div class="card-panel lighten-5">
		<form class="red-text" action="edita.php?id=<?php echo $valor ?>"method="POST">
			<div class="row">
				<div class="col s8">
					<input type="text" name="nome_atualiza" value="<?php echo $nome ?>">
				</div>

				<div class="col s4">
					<input type="text" name="tele_atualiza" maxlength="14" id="telefone"value="<?php echo $telefone ?>">
				</div>

				<div class="col s12">
					<input type="text" name="email_atualiza" value="<?php echo $email ?>">
				</div>
			</div>
				
			<div class="row">
				<div class="col s5">
					<input class="btn" type="submit" value="Enviar">
				</div>
				<div class="col s5">
					<a href="adms.php" class="btn red lighten-2">cancelar</a>
				</div>
			</div>
		</form>
		</div>
</div>
</div>

<script type="text/javascript">
	const tel = document.getElementById('telefone') // Seletor do campo de telefone

tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

const mascaraTelefone = (valor) => {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
    tel.value = valor // Insere o(s) valor(es) no campo
}
</script>
<?php
}
?>


<div class="container">
	<?php
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
}
unset($_SESSION['msg']);
?>
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
    			echo "<a href='adms.php?id2=" . $row['id'] . "'><i class='material-icons left small light-blue-text text-lighten-2'>edit</i>";
    			echo "</td>";

    			echo "<td width='30px'>";
    			echo "<a href='delet.php?id2=".$row['id'] ."'><i class='material-icons left small red-text text-lighten-2'>delete</i></a>";
    			echo "</td></tr>";
			}

			?>
		</tbody>	
    	</table>
	</div>
</div>



</main>




<script src="loading.js"></script>

</body>
</html>
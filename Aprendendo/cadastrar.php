<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina de cadastro de usuarios</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="MATERIALIZE-CSS/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="meu_estilo.css">
	<style type="text/css">

		#pai{
			display: flex;
			align-content: flex-start;
			background-color: gray;
			width: 100%;
			height: 100vh;
		}

		#filho{
			width: 180px;
			height: 180px;
			background-color: green;

		}
	</style>
</head>

<body background="714660.png" style="background-position-x: -100px;">
	<header>
	<nav class="green lighten-1">
    	<div class="nav-wrapper container">
     		 <a href="#"><img alt="" class="circle responsive-img" src="dogo-argentino.png"></a>
      			<ul class="right">
        			<li><a href="adms.php" onmousedown="showLoading()"><i class="material-icons left">contacts</i>Consultar</a></li>
        			<li class="active"><a href="cadastrar.php" onmousedown="showLoading()"><i class="material-icons left">add_box</i>Cadastrar</a></li>
        			<li><a href="index.php"><i class="material-icons left">logout</i></a></li>
      			</ul>
    	</div>
  </nav> 
</header>
	
<main>
<?php
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
}
unset($_SESSION['msg']);
?>

<div class="row">
 <div class="col s6 push-s3">

		<div class="card-panel">
			<i class="material-icons left large ">account_circle</i><h3>Cadastrar Usuario</h3>
		</div>

		<div class="card-panel">
			<form action="cadastro.php" method="post">
			 <div class="row">
			 	<div class="col s8 input-field">
					<input type="text" name="nome" placeholder="Insira seu nome" required>
				</div>
				<div class="col s4 input-field">
					<input type="tel" name="telefone" placeholder="Insira seu telefone" id="telefone" maxlength="14">
				</div>
			</div>
				<input type="email" name="email" placeholder="Insira seu e-mail" required>
				
				<div class="row center" style="margin-top: 20px">
						<input type="submit" value="Enviar"class="btn">
						<input type="reset" value="Resetar" class="btn red lighten-2">
				</div>
			</form>
		 </div> <!-- Formulario-->

   <!--</div> oque ta com container-->
 </div> <!-- Coluna com 6 colunas--> 
</div> <!-- linha de tudo -->

</main>

<script src="loading.js"></script>

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

</body>
</html>
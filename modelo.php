<!DOCTYPE html>
<?php

?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
		<link rel="icon" type="image/png" href="imagens/meufavicon.png" />
		<title>Projeto OnContábil</title>
	</head>
	<body>
		<div id="cadastro">
			<form method="post" action="processa.php">
				<fieldset>
					<legend id="legendCad">Cadastro de modelo</legend>
					<input type="text" name="nome" id="formMod" placeholder="Nome do modeo">
					<input type="number" name="qnt" id="formMod" placeholder="Quantidade"></br>
					<label for="colecao" id="labelCol">Selecione a coleção que este modelo pertence:</label></br>
					<select name="colecao" id="colecao">
						<option value="1">Coleção Primavera/Verão 2020</option>
						<option value="2">Coleção Outono/Inverno 2021</option>
					</select></br>
					<input type="text" name="desc" id="idesc" placeholder="Descreva o modelo"></br>
					<input type="submit" value="Cadastrar Modelo" id="idsubmit" name="subMod">
				</fieldset>
			</form>
		</div>
	</body>
</html>
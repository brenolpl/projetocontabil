<!DOCTYPE html>
<?php
include ('conecta.php');
include ('database.php');
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
			<p>Já possui um cadastro? <a href="index.php">clique aqui</a> para efetuar o login</p>
			<form method="post" action="processa.php" id="formCadatro">
				<fieldset id="idempresa">
					<legend id="legendCad">Identificação da Empresa</legend>
					<input type="text" name="razao" id="formCad" placeholder="Razão Social" required></br>
					<input type="tel" maxlength="11" name="tel" id="idtel" placeholder="Telefone" required>
					<label for="situacao" id="idsituacao">Situação: </label>
					<select name="situacao" id="idsituacao">
						<option value="1">Ativa</option>
						<option value="0">Inativa</option>
					</select></br>
					<label for="tarefa" id="idtarefa">Selecione a tarefa que irá realizar: </label></br>
					<select name="tarefa" id="idsituacao">
						<option value="1">Lavagem/Secagem I</option>
						<option value="2">Corte</option>
						<option value="3">Costura Base</option>
						<option value="4">Estampagem</option>
						<option value="5">Etiquetagem</option>
						<option value="6">Lavagem/Secagem II</option>
						<option value="7">Embalagem</option>

						
					</select>
					</br>
					<input type="text" name="nome" id="formCad" placeholder="Nome Fantasia" required></br>
					<input type="text" name="resp" id="formCad" placeholder="Responsável" required></br>
					<input type="text" name="cnpj" id="idcnpj" maxlength="14" required="14" required placeholder="CNPJ" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></br>
					
					</fieldset>

					<fieldset id="idendereco"><legend id="legendCad">Endereço</legend required>
					<input type="text" name="lograd" id="endForm" placeholder="Logradouro" required>
					<label for="numero" id="idnumero">Número: </label>
					<input type="text" name="numero" required
					maxlength="4" id="idnumero" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></br>
					<input type="text" name="cidade" id="endForm" placeholder="Cidade" required>
					<input type="text" name="estado" id="endForm" placeholder="Estado" required></br>
					<input type="text" name="pais" id="endForm" placeholder="País" required></br>
					</fieldset>
					
					
					<fieldset id="idusuario">
						<legend id="legendCad">Identificação de Usuário</legend>
					<input type="text" name="user" required="required" id="iduser" placeholder="Usuário" required maxlength="12" pattern="[a-z\s]+$"></br>
					<input type="password" name="senha" id="iduser" placeholder="Senha" required></br>
					<input type="password" name="confSenha" id="iduser" placeholder="Confirme sua senha" required>
					<input type="submit" value="Cadastrar" id="idsubmit" name="subCad">
				</fieldset>
			</form>
		</div>
	</body>
</html>
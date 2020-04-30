<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
		<link rel="icon" type="image/png" href="imagens/meufavicon.png" />
		<title>Projeto OnContábil</title>
	</head>
	<body>
		<div id="interface">
			<form method="post" action="processa.php">
				<fieldset id="login"><legend id="signin">Sign IN</legend>
				<input type="text" name="user" id="formlogin" placeholder="Usuário" required="required" maxlength="12">
				<input type="password" name="senha" id="formlogin" placeholder="Senha" required="required"></br>
				<input type="submit" value="Iniciar Sessão" id="idlogar" name="subLogin">
				<a href="cadastro.php" id="singup">SIGN UP</a>
				</fieldset>
			</form>
		</div>
	</body>
</html>
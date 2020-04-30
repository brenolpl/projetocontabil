<!DOCTYPE html>
<?php
include ('funcoes.php');
include ('conecta.php');
include ('database.php');
//require ('database.php');
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php
			$url = $_POST["subCad"];
			if (!empty($url)) {
				$nome = isset($_POST["nome"])?$_POST["nome"]:"Falhou nome";
				$razao  = isset($_POST["razao"])?$_POST["razao"]:"Falhou razao";
				$tel = isset($_POST["tel"])?$_POST["tel"]:"Falhou tel";
				$tarefa = isset($_POST["tarefa"])?$_POST["tarefa"]:"Falhou tarefa";
				$responsavel = isset($_POST["resp"])?$_POST["resp"]:"Falhou responsável";
				$cnpj = isset($_POST["cnpj"])?$_POST["cnpj"]:"Falhou cnpj";
				$situacao = isset($_POST["situacao"])?$_POST["situacao"]:"Falhou situacao";
				////////////////////////////////////////////////


				$lograd = isset($_POST["lograd"])?$_POST["lograd"]:"Falhou logradouro";
				$pais = isset($_POST["pais"])?$_POST["pais"]:"Falhou pais";
				$cidade = isset($_POST["cidade"])?$_POST["cidade"]:"Falhou cidade";
				$estado = isset($_POST["estado"])?$_POST["estado"]:"Falhou estado"; 
				$numero = isset($_POST["numero"])?$_POST["numero"]:"Falhou numero";

				

				$login = isset($_POST["user"])?$_POST["user"]:"Falhou login";
				$senha = isset($_POST["senha"])?$_POST["senha"]:"Falhou senha";
				$confSenha = isset($_POST["confSenha"])?$_POST["confSenha"]:"Falhou confirmar senha";
				$criptSenha= password_hash($senha, PASSWORD_DEFAULT);
				$usuario = array(
					"login" => $login,
					"senha" => $criptSenha,
					"nome_fantasia" => $nome,
					"responsavel" => $responsavel,
					"razao" => $razao,
					"telefone" => $tel,
					"cnpj" => $cnpj,
					"situacao" => $situacao,
					"tarefa" => $tarefa
				);

				if ($senha != $confSenha) {
					echo  "<script>alert('Senhas não conferem');</script>";
					echo "<script>location.href='cadastro.php';</script>";
				}
				

				//trecho verificador do cnpj
				$cnpj_num = valida_num_cnpj($cnpj);
				if($cnpj_num){
					$cnpj_igual = valida_cnpj_igual($cnpj);
					if($cnpj_igual){
						$verificado=  false;
					}else{
						$cnpj_calc = cpnj_verificador($cnpj);
						if($cnpj_calc){
							$verificado = true;
						}else{
							$verificado = false;
						}
					}
				}else{
					$verificado =  false;
				}
				if (!$verificado) {
					echo  "<script>alert('CNPJ INVÁLIDO');</script>";
					echo "<script>location.href='cadastro.php';</script>";
				}
				//fim do trecho verificador do cnpj
				
				
				$read = DBRead($conn, 'usuario', null, 'cnpj, login');

				$verify = valida_usuario((array)$read, $login);
				if (!$verify) {
					echo  "<script>alert('Usuário inválido ou já existente');</script>";
					echo "<script>location.href='cadastro.php';</script>";
				}

				$verify = valida_cnpj_banco((array)$read, $cnpj);

				if (!$verify) {
					echo  "<script>alert('CNPJ já cadastrado');</script>";
					echo "<script>location.href='cadastro.php';</script>";
				}
				
				$gravaUser = DBCreate('usuario', $usuario, $conn);

				$read = DBRead($conn, 'usuario', "WHERE login = '$login'", 'idlogin');
				var_dump($read);
				foreach ($read as $key) {
					if ($key['idlogin']>0) {
						$idlogin=$key['idlogin'];
					}
				}

				echo "</br> idlogin: $idlogin </br>";

				$endereco = array(
					'logradouro' => $lograd,
					'num' => $numero,
					'cidade' => $cidade,
					'estado' => $estado,
					'pais' => $pais,
					'usuario' => $idlogin
				);

				$gravaAdress = DBCreate('endereco', $endereco, $conn);
				echo "</br>";
				if ($gravaUser && $gravaAdress) {
					echo  "<script>alert('Cadastro efetuado com sucesso!');</script>";
					echo "<script>location.href='index.php';</script>";
				}else {
					echo  "<script>alert('Falha ao efetuar cadastro!');</script>";
					echo "<script>location.href='cadastro.php';</script>";
				}
				
			}
		$url = $_POST["subLogin"];
		if (!empty($url)) {
			$login = isset($_POST["user"])?$_POST["user"]:"Falhou login";
			$senha = isset($_POST["senha"])?$_POST["senha"]:"Falhou senha";
			$read = DBRead($conn, 'usuario', null, 'login, senha');
			$verifyUser = valida_usuario((array)$read, $login);
			$verifySenha = valida_senha((array)$read, $senha);
			if (!$verifyUser && $verifySenha) { //inverte pois o uso da valida_usuario verifica se existe um usuario ja existente, e se existe, retorna false
				$_SESSION['user'] = $login;
				$_SESSION['senha'] = $senha;
				header('location:site.php');
			}else{
				unset ($_SESSION['user']);
				unset ($_SESSION['senha']);
				//header('location:index.php');
				echo  "<script>alert('Usuário ou senha inválidos');</script>";
				echo "<script>location.href='index.php';</script>";
			}
		}
		$url = $_POST["subMod"];
		if (!empty($url)) {
			$nomeMod=isset($_POST["nome"])?$_POST["nome"]:"Falhou nome";
			$qnt=isset($_POST["qnt"])?$_POST["qnt"]:"Falhou qnt";
			$colecao=isset($_POST["colecao"])?$_POST["colecao"]:"Falhou colecao";
			$descricao=isset($_POST["desc"])?$_POST["desc"]:"Falhou desc";

			$modelo = array(
				'nome'=> $nomeMod,
				'qnt' => $qnt,
				'descricao' => $descricao,
				'colecao' => $colecao
			);
			$gravaMod = DBCreate('modelo', $modelo, $conn);
			if (!$gravaMod) {
				echo  "<script>alert('Falha ao cadastrar modelo');</script>";
				echo "<script>location.href='site.php';</script>";
			}else{
				echo  "<script>alert('Modelo cadastrado!');</script>";
				echo "<script>location.href='site.php';</script>";
			}
		}

		?>
	</body>
</html>
<?php
	//declaração de variáveis para conexão
	$servername='localhost';
	$username='root';
	$password='';
	$database='desafio';

	//comando MySQL para conexão
	$conn=mysqli_connect($servername, $username, $password, $database);

	//teste de conexão
	if(!$conn)
		die("Falha na conexão: ".mysqli_connect_error());

	//echo "Conexão estabelecida com sucesso!";
?>
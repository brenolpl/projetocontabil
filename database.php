<?php
	function DBQuery ($query, $conn){ // grava registros
		$result = mysqli_query($conn, $query) or die("Falha na Query:".mysqli_error($conn));
		return $result;
	}	

	function DBCreate ($table, array $dados, $conn){ // cria registros
		$indices = implode(', ', array_keys($dados));
		$valores ="'".implode("', '", $dados)."'";
		$query = "INSERT INTO {$table} ({$indices}) VALUES ({$valores})";
		return DBQuery($query, $conn);
	}


	function DBRead ($conn, $table, $parameters=null, $campos ='*'){// lê registros
		$parameters = ($parameters)?" {$parameters}":null;
		$query = "SELECT {$campos} FROM  {$table}{$parameters}";

		var_dump($query); 
		$result = DBQuery($query, $conn);

		if(!mysqli_num_rows($result)){
			return false;
		}else{
			 while($res = mysqli_fetch_assoc($result)){
			 	$dados[] = $res;
			 };
		}
		return $dados;
	}

	//function DBCreate($table, $data)
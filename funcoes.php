<?php

function valida_num_cnpj($cnpj){
	if (strlen($cnpj) != 14) {
		return false;
	}
	return true;
}

function valida_cnpj_igual($cnpj){ //valida se o cnpj possui os números iguais
	$tam = strlen($cnpj);
	$vet = str_split($cnpj); // vet transforma cnpj em um vetor com um número em cada posição
	$valor = $vet[0];
	for ($i=1; $i < $tam; $i++) { 
		if ($vet[0]!=$vet[$i]) {
			return false;
		}
	}
	return true;
}

function cpnj_verificador($cnpj){
	$tam= strlen($cnpj);
	$vet=str_split($cnpj);
	$soma = 0;
	$multi = array(5,4,3,2,9,8,7,6,5,4,3,2); //array multiplicador para o primeiro digito verificador
	for ($i=0; $i <$tam-2 ; $i++) { //aqui soma-se os numeros do cnpj multiplicado com o array multi
		$soma=$soma + ($vet[$i]*$multi[$i]);
	}
	$resto=$soma%11;//resto da divisão do somatorio para verificar se o digito será maior ou menor q 2
	if ($resto<2) {
		$pdig=0;
	}else{
		$pdig=11-$resto;//pdig é o primeiro digito verificador
	}
	$pdig = abs($pdig); // caso a subtração dê negativo
	if ($vet[12]!=$pdig) { //verifica se o primeiro digito verficador informado bate com o calculado
		return false;
	}
	array_unshift($multi, 6); //adiciono 6 no primeiro elemento do array multi para calcular o segundo digito verificador
	$soma = 0;
	for ($i=0; $i <$tam-1 ; $i++) { 
		$soma=$soma + ($vet[$i]*$multi[$i]);
	}
	$resto=$soma%11;
	if ($resto<2) {
		$sdig=0;
	}else{
		$sdig=11-$resto; //sdig é o segundo digito verificador
	}
	$sdig = abs($sdig);
	if ($vet[13]!=$sdig) {
		return false;
	}
	return true;
}

function valida_usuario(array $read, $user){ //valida se o usuario efetuando cadastro ja foi cadastrado
	foreach ($read as $usuario) {
		if($usuario['login']==$user){
			return false;
		 }
	}
	return true;
}
/*function criptSenha($senha, $encript) {
	if (password_verify($senha, $criptsenha)){//descodifica senha
		return true;
	}else{
		return false;
	}
}*/	

function valida_senha(array $read, $senha){
	foreach ($read as $value) {
		if (password_verify($senha, $value['senha'])) {
			return true;
		}
	}
	return false;
}

function valida_cnpj_banco ( array $read, $cnpj){ // valida se o cnpj ja foi cadastrado
	foreach ($read as $cnpj_ver) {
		if ($cnpj_ver['cnpj']==$cnpj) {
			return false;
		}
	}
	return true;
}


?>
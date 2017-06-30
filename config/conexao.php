<?php
	$host = "localhost";
	$user = "root";
	$senha = "";
	$bd = "estoquenew_db";

	$mysqli = new mysqli($host,$user,$senha,$bd) or die("Não foi possível conectar ao banco de dados, por favor verifique a conexão");
?>
<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd = "sistema softfood";


$conexao = @mysql_connect($servidor, $usuario, $senha) or die("Erro ao conectar");
if ($sql_banco = mysql_select_db($bd, $conexao)){
    echo "conexao com banco de dados realizada com sucesso!";
} else{
    echo "erro ao conectar com o banco de dados!";
    }


?>
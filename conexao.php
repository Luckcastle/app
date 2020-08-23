<?php 

$host = 'localhost';
$usuario = 'root';
$senha = '';
$db = 'estudos';

$conexao = mysqli_connect($host,$usuario,$senha,$db);

if(mysqli_connect_error($conexao)){
    echo "Erro ao conectar".mysqli_connect_error();
}
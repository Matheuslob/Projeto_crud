<?php

$host = 'localhost';
$db = 'empresa';
$user = 'root';
$password = '';


$conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);

function mostra_data($data){
    $d= explode('-', $data);
    $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
    return $escreve;
}
?>
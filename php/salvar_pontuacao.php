<?php
include ('conexao.php');

$nome = $_POST['nome'];
$pontuacao = $_POST['pontuacao'];

$sql = "INSERT INTO ranking (nome, pontuacao) VALUES ('$nome', '$pontuacao')";
mysqli_query($conn, $sql);

header("Location: ranking.php");
exit;
?>
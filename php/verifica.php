<?php

session_start();

include('conexao.php');
 
$resposta = $_POST['resposta'];

$num = $_SESSION['pergunta_atual'];
 
$sql = "SELECT correta FROM perguntas WHERE id = $num";

$res = mysqli_query($conn, $sql);
 
if ($res && mysqli_num_rows($res) > 0) {

    $correta = mysqli_fetch_assoc($res)['correta'];
 
    // Incrementa pontos se a resposta estiver correta

    if ($resposta == $correta) {

        if (!isset($_SESSION['pontos'])) {

            $_SESSION['pontos'] = 0;

        }

        $_SESSION['pontos'] += 1;

    }
 
    // Vai para a próxima pergunta

    $_SESSION['pergunta_atual'] += 1;
 
    header("Location: pergunta.php");

    exit;

} else {

    // Se não encontrou pergunta, vai direto para o resultado

    header("Location: resultado.php");

    exit;

}

 
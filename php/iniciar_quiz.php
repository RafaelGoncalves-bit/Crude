<?php
session_start();
session_unset();

$_SESSION['quiz_iniciado'] = true;
$_SESSION['pergunta_atual'] = 1;
$_SESSION['pontos'] = 0;

// Só pra testar, escreve no arquivo de log
file_put_contents('log.txt', "Iniciar quiz acessado em " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

header("Location: pergunta.php");
exit;

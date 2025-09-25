<?php
session_start();
session_unset(); // limpa a sessão

$_SESSION['quiz_iniciado'] = true;
$_SESSION['pergunta_atual'] = 1;

header("Location: ./pergunta.php"); // ← Caminho corrigido
exit;

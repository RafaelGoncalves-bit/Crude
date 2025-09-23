<?php
session_start();
session_unset();
session_destroy();

// Reinicia a sessão para começar do zero
session_start();
$_SESSION['quiz_iniciado'] = true;
$_SESSION['pergunta_atual'] = 1;

// Redireciona para a primeira pergunta
echo "Redirecionando para pergunta.php...";
exit;


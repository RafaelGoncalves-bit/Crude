<html>
    <head>
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
</html>

<?php

session_start();

include('conexao.php');
 
// Se a pergunta atual não estiver definida, comece do 1

if (!isset($_SESSION['pergunta_atual'])) {

    $_SESSION['pergunta_atual'] = 1;

}
 
$num = intval($_SESSION['pergunta_atual']); // Garante que seja número inteiro
 
$sql = "SELECT * FROM perguntas WHERE id = $num";

$res = mysqli_query($conn, $sql);


if (!$res || mysqli_num_rows($res) == 0) {

    // Se não houver mais perguntas, redireciona para resultado

    header("Location: resultado.php");

    exit;

}
 
$pergunta = mysqli_fetch_assoc($res);

?>

<html>
    <main>
    <div class="container meio">
    <div class="text-center">
<h3>Pergunta <?= $num ?></h3>
</div>
<form method="post" action="verifica.php">
<p><?= $pergunta['pergunta'] ?></p>
<label><input type="radio" name="resposta" value="a" required> <?= $pergunta['alternativa_a'] ?></label><br>
<label><input type="radio" name="resposta" value="b" required> <?= $pergunta['alternativa_b'] ?></label><br>
<label><input type="radio" name="resposta" value="c" required> <?= $pergunta['alternativa_c'] ?></label><br>
<label><input type="radio" name="resposta" value="d" required> <?= $pergunta['alternativa_d'] ?></label><br>
<button type="submit">Enviar Resposta</button>
</form>
</div>
</main>
</html>
<html>
    <head>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body class="preto3">


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


    <main>
    <div class="container meio">
    <div class="text-center">
<h2>Pergunta <?= $num ?>:</h2>
</div>
<form class="text-center" method="post" action="verifica.php">
<h3 class="text-center"><?= $pergunta['pergunta'] ?></h3>
<div class="margem">
<div class="flex gap-2">
<button type="submit" name="resposta" value="a" class="btn btn-primary w-100 mb-2"><p>A. <?= $pergunta['alternativa_a'] ?></p></button>
<button type="submit" name="resposta" value="b" class="btn btn-success w-100 mb-2"><p>B. <?= $pergunta['alternativa_b'] ?></p></button>
</div>
<div class="flex gap-2">
<button type="submit" name="resposta" value="c" class="btn btn-danger w-100 mb-2"><p>C. <?= $pergunta['alternativa_c'] ?></p></button>
<button type="submit" name="resposta" value="d" class="btn btn-warning w-100 mb-2"><p>D. <?= $pergunta['alternativa_d'] ?></p></button>
<!-- <button class="botao-pequeno" type="submit">Enviar Resposta</button> -->
 </div>
 </div>
</form>
</div>
</main>
</body>
</html>
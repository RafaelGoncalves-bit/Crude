<?php
session_start();
$pontos = $_SESSION['pontos'];
?>

<html>
<main>
    <head>
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
<div class="container meio">
<div class="text-center">
<h2 class="margem">Fim do Quiz!</h2>
<p>Você acertou <?= $pontos ?> perguntas.</p>
</div>
<div class="text-center">
<form method="post" action="salvar_pontuacao.php">
    <label>Digite seu nome:</label>
    <input type="text" name="nome" required>
    <input type="hidden" name=pontuacao value="<?= $pontos ?>">
    <button type="submit">Salvar no Ranking</button>
</form>
<br><a href="ranking.php">Ver Ranking</a>
</div>

</div>
</main>
</html>
<?php
session_start();
$pontos = isset($_SESSION['pontos']) ? $_SESSION['pontos'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado do Quiz</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="preto2">
<main>
    <div class="container meio">
        <div class="text-center">
            <h2 class="margem">Fim do Quiz!</h2>
            <p>Você acertou <?= $pontos ?> perguntas.</p>
        </div>
        <div class="text-center">
            <form method="post" action="salvar_pontuacao.php">
                <label>Digite seu nome:</label>
                <input class="nome" type="text" name="nome" required>
                <input type="hidden" name="pontuacao" value="<?= $pontos ?>">
                <button type="submit" class="btn btn-success botao-pequeno">Salvar no Ranking</button>
            </form>
            <br>
            <a class="link-offset-2 link-underline link-underline-opacity-0 link-light" href="ranking.php">Ver Ranking</a>
            <a href="./iniciar_quiz.php" class="btn btn-secondary">Refazer Quiz</a>
        </div>
    </div>
</main>
</body>
</html>

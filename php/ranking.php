<?php

include('conexao.php');
 
$sql = "SELECT nome, pontuacao, data_registro FROM ranking ORDER BY pontuacao DESC, data_registro ASC LIMIT 10;";

$res = mysqli_query($conn, $sql);

?>
 <html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
    <body class="preto3">
    <main>

    <div class="meio-ranking">
  <h2 class="text-center mb-4">Ranking - Top 10</h2>

  <div class="table-responsive">
    <table class="table table-dark table-striped table-bordered text-center align-middle">
      <thead class="table-light">
        <tr>
          <th>Posição</th>
          <th>Nome</th>
          <th>Pontuação</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pos = 1;
        while($row = mysqli_fetch_assoc($res)) {
            echo "<tr>
              <td>$pos</td>
              <td>" . htmlspecialchars($row['nome']) . "</td>
              <td>{$row['pontuacao']}</td>
              <td>{$row['data_registro']}</td>
            </tr>";
            $pos++;
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="text-center mt-4">
    <a href="../index.html" class="btn btn-outline-light">Voltar ao Início</a>
  </div>
</div>
</main>
</body>
 </html>
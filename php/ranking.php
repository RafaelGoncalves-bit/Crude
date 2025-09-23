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
    
</head>
    <body class="preto3">
    <main>

    <div class="meio-ranking">
<h2 style="text-align: center; margin-bottom: 5%;">Ranking - Top 10</h2>
<table style="color: white;" border="1">
<tr>
<th>Posição</th>
<th>Nome</th>
<th>Pontuação</th>
<th>Data</th>
</tr>


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
</table>
 
<a href="../indes.html">Voltar ao Início</a>
</div>
</main>
</body>
 </html>
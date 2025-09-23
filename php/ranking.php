<?php

include('conexao.php');
 
$sql = "SELECT nome, pontuacao, data_registro FROM ranking ORDER BY pontuacao DESC, data_registro ASC LIMIT 10;";

$res = mysqli_query($conn, $sql);

?>
 <html>
    
    <body class ="preto">
    <main>
        <div class="text-center">
<h2>Ranking - Top 10</h2>
<table border="1">
<tr>
<th>Posição</th>
<th>Nome</th>
<th>Pontuação</th>
<th>Data</th>
</tr>
</div>


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
</main>
</body>
 </html>
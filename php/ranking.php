<?php

include('conexao.php');
 
$sql = "SELECT nome, pontuacao, data_registro FROM ranking ORDER BY pontuacao DESC, data_registro ASC LIMIT 10;";

$res = mysqli_query($conn, $sql);

?>
 
<h2>Ranking - Top 10</h2>
<table border="1">
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
 
<a href="../index.html">Voltar ao Início</a>

 
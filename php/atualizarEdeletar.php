<?php
$conn = new mysqli("localhost", "root", "", "seu_banco");

// Atualiza se foi enviado um POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $pergunta = $_POST['pergunta'];
  $a = $_POST['opcao_a'];
  $b = $_POST['opcao_b'];
  $c = $_POST['opcao_c'];
  $d = $_POST['opcao_d'];
  $resposta = strtoupper($_POST['resposta_correta']);

  $sql = "UPDATE quiz SET 
    pergunta = '$pergunta',
    opcao_a = '$a',
    opcao_b = '$b',
    opcao_c = '$c',
    opcao_d = '$d',
    resposta_correta = '$resposta'
    WHERE id = $id";

  $conn->query($sql);
  echo "<p style='color:purple;'>Pergunta atualizada!</p>";
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM quiz WHERE id = $id");
  echo "<p style='color:green;'>Pergunta deletada!</p>";
}

// Perguntas
$result = $conn->query("SELECT * FROM quiz");

while ($row = $result->fetch_assoc()) {
?>
  <form method="POST" style="margin-bottom: 30px;">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    
    <label>Pergunta:</label><br>
    <textarea name="pergunta"><?= $row['pergunta'] ?></textarea><br>

    <label>Opção A:</label>
    <input type="text" name="opcao_a" value="<?= $row['opcao_a'] ?>"><br>

    <label>Opção B:</label>
    <input type="text" name="opcao_b" value="<?= $row['opcao_b'] ?>"><br>

    <label>Opção C:</label>
    <input type="text" name="opcao_c" value="<?= $row['opcao_c'] ?>"><br>

    <label>Opção D:</label>
    <input type="text" name="opcao_d" value="<?= $row['opcao_d'] ?>"><br>

    <label>Resposta Correta:</label>
    <input type="text" name="resposta_correta" value="<?= $row['resposta_correta'] ?>"><br><br>

    <button type="submit">Salvar Alterações</button>
    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Cuidado pra nao fazer caquinha tem certeza que quer excluir?')">Excluir</a>
  </form>
<?php
}
?>

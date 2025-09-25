<?php
$conn = new mysqli("localhost", "root", "", "quiz");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Adicionar nova pergunta
if (isset($_POST['adicionar'])) {
    $pergunta = $conn->real_escape_string($_POST['pergunta']);
    $a = $conn->real_escape_string($_POST['alternativa_a']);
    $b = $conn->real_escape_string($_POST['alternativa_b']);
    $c = $conn->real_escape_string($_POST['alternativa_c']);
    $d = $conn->real_escape_string($_POST['alternativa_d']);
    $correta = strtoupper($conn->real_escape_string($_POST['correta']));

    $sql = "INSERT INTO perguntas (pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, correta)
            VALUES ('$pergunta', '$a', '$b', '$c', '$d', '$correta')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pergunta adicionada com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao adicionar: " . $conn->error . "</div>";
    }
}

// Atualizar pergunta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $id = intval($_POST['id']);
    $pergunta = $conn->real_escape_string($_POST['pergunta']);
    $a = $conn->real_escape_string($_POST['alternativa_a']);
    $b = $conn->real_escape_string($_POST['alternativa_b']);
    $c = $conn->real_escape_string($_POST['alternativa_c']);
    $d = $conn->real_escape_string($_POST['alternativa_d']);
    $correta = strtoupper($conn->real_escape_string($_POST['correta']));

    $sql = "UPDATE perguntas SET 
        pergunta = '$pergunta',
        alternativa_a = '$a',
        alternativa_b = '$b',
        alternativa_c = '$c',
        alternativa_d = '$d',
        correta = '$correta'
        WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pergunta atualizada!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar: " . $conn->error . "</div>";
    }
}

// Deletar pergunta
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($conn->query("DELETE FROM perguntas WHERE id = $id") === TRUE) {
        echo "<div class='alert alert-success'>Pergunta deletada!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao deletar: " . $conn->error . "</div>";
    }
}

$result = $conn->query("SELECT * FROM perguntas");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Gerenciar Perguntas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-4">
    <h1 class="mb-4 text-center">Gerenciar Perguntas do Quiz</h1>

    <!-- Formulário para adicionar nova pergunta -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Adicionar Nova Pergunta</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Pergunta:</label>
                    <textarea class="form-control" name="pergunta" rows="3" required></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Opção A:</label>
                        <input type="text" class="form-control" name="alternativa_a" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Opção B:</label>
                        <input type="text" class="form-control" name="alternativa_b" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Opção C:</label>
                        <input type="text" class="form-control" name="alternativa_c" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Opção D:</label>
                        <input type="text" class="form-control" name="alternativa_d" required>
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Resposta Correta (A, B, C ou D):</label>
                    <input type="text" class="form-control" name="correta" maxlength="1" required pattern="[ABCDabcd]">
                </div>
                <button type="submit" name="adicionar" class="btn btn-success">Adicionar Pergunta</button>
            </form>
        </div>
    </div>

    <!-- Listagem para editar/deletar perguntas -->
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pergunta:</label>
                        <textarea class="form-control" name="pergunta" rows="3" required><?= htmlspecialchars($row['pergunta']) ?></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Opção A:</label>
                            <input type="text" class="form-control" name="alternativa_a" value="<?= htmlspecialchars($row['alternativa_a']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Opção B:</label>
                            <input type="text" class="form-control" name="alternativa_b" value="<?= htmlspecialchars($row['alternativa_b']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Opção C:</label>
                            <input type="text" class="form-control" name="alternativa_c" value="<?= htmlspecialchars($row['alternativa_c']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Opção D:</label>
                            <input type="text" class="form-control" name="alternativa_d" value="<?= htmlspecialchars($row['alternativa_d']) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Resposta Correta (A, B, C ou D):</label>
                        <input type="text" class="form-control" name="correta" maxlength="1" value="<?= htmlspecialchars($row['correta']) ?>" required pattern="[ABCDabcd]">
                    </div>

                    <button type="submit" name="salvar" class="btn btn-primary me-2">Salvar Alterações</button>
                    <a href="?delete=<?= $row['id'] ?>" 
                       class="btn btn-danger" 
                       onclick="return confirm('Tem certeza que quer excluir esta pergunta?')">
                       Excluir
                    </a>
                </form>
            </div>
        </div>
    <?php
        }
    } else {
        echo "<p class='text-center'>Nenhuma pergunta encontrada.</p>";
    }

    $conn->close();
    ?>
</div>
</body>
</html>

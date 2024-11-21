<?php
$conn = new mysqli("localhost", "root", "root", "solicitacoes_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $descricao = $_POST['descricao'];
    $urgencia = $_POST['urgencia'];

    $sql = "INSERT INTO solicitacoes (cliente_id, descricao, urgencia) VALUES ('$cliente_id', '$descricao', '$urgencia')";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Erro ao salvar: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Solicitação</title>
</head>
<body>
    <h1>Adicionar Solicitação</h1>
    <form action="add_solicitacao.php" method="POST">
        Cliente:
        <select name="cliente_id">
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
            <?php endwhile; ?>
        </select><br>
        Descrição: <textarea name="descricao" required></textarea><br>
        Urgência:
        <select name="urgencia">
            <option value="baixa">Baixa</option>
            <option value="média">Média</option>
            <option value="alta">Alta</option>
        </select><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>

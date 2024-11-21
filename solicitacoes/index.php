<?php
$conn = new mysqli("localhost", "root", "root", "solicitacoes_db");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$result = $conn->query("SELECT solicitacoes.*, clientes.nome AS cliente_nome 
                        FROM solicitacoes 
                        JOIN clientes ON solicitacoes.cliente_id = clientes.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitações</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Solicitações</h1>
    <a href="add_cliente.php">Adicionar Cliente</a> | 
    <a href="add_solicitacao.php">Adicionar Solicitação</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Descrição</th>
                <th>Urgência</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['cliente_nome'] ?></td>
                <td><?= $row['descricao'] ?></td>
                <td><?= $row['urgencia'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['data_abertura'] ?></td>
                <td>
                    <form action="update_status.php" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <select name="status">
                            <option value="pendente" <?= $row['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                            <option value="em andamento" <?= $row['status'] == 'em andamento' ? 'selected' : '' ?>>Em andamento</option>
                            <option value="finalizada" <?= $row['status'] == 'finalizada' ? 'selected' : '' ?>>Finalizada</option>
                        </select>
                        <button type="submit">Atualizar</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "root", "solicitacoes_db");

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO clientes (nome, cpf, email, telefone) VALUES ('$nome', '$cpf', '$email', '$telefone')";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Erro ao salvar: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Cliente</title>
</head>
<body>
    <h1>Adicionar Cliente</h1>
    <form action="add_cliente.php" method="POST">
        Nome: <input type="text" name="nome" required><br>
        CPF: <input type="text" name="cpf" required><br>
        Email: <input type="email" name="email" required><br>
        Telefone: <input type="text" name="telefone" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>

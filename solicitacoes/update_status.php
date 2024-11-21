<?php
$conn = new mysqli("localhost", "root", "root", "solicitacoes_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE solicitacoes SET status='$status' WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

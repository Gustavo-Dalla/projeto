<?php
// Inclui a conexão com o banco
include_once 'db.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o id do usuário
    $id = $_POST['id'];

    // Prepara a query para deletar o usuário
    $stmt = $conn->prepare("DELETE FROM Usuario WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Usuário deletado com sucesso";
    } else {
        echo "Erro ao deletar: " . $stmt->error;
    }

    $stmt->close();
}

// Fecha a conexão
$conn->close();
?>
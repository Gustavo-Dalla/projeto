<?php
// Inclui a conexão com o banco
include_once 'db.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
    $data_cad = date('Y-m-d'); // Data de cadastro atual
    $cpf = $_POST['cpf'];

    // Prepara a query para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO Usuario (nome, email, senha, data_cad, cpf) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $email, $senha, $data_cad, $cpf);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

// Fecha a conexão
$conn->close();
?>
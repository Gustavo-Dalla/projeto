<?php
// Inclui a conexão com o banco
include_once 'db.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_cad = $_POST['data_cad'];
    $cpf = $_POST['cpf'];

    // Prepara a query para evitar SQL Injection
    $sql = "UPDATE Usuario SET nome=?, email=?, senha=?, data_cad=?, cpf=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $nome, $email, $senha, $data_cad, $cpf, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

// Fecha a conexão
mysqli_close($conn);
?>
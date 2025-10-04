<?php
// Inclui a conexão com o banco de dados
include_once 'db.php';

// Consulta dados da tabela Usuario
$sql = "SELECT id, nome, email, data_cad, cpf FROM Usuario";
$result = mysqli_query($conn, $sql);

// Verifica se há registros
if (mysqli_num_rows($result) > 0) {
    // Exibe os dados de cada usuário
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Email: " . $row["email"] .
             " - Data Cadastro: " . $row["data_cad"] . " - CPF: " . $row["cpf"] . "<br>";
    }
} else {
    echo "Nenhum registro encontrado";
}

// Fecha a conexão
mysqli_close($conn);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf = $_POST["cpf"];
    $cep = $_POST["cep"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($cep) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido.";
    } elseif (!preg_match("/^\d{3}\.\d{3}\.\d{3}-\d{2}$/", $cpf)) {
        echo "CPF inválido.";
    } elseif (!preg_match("/^\d{5}-\d{3}$/", $cep)) {
        echo "CEP inválido.";
    } elseif (strlen($senha) < 8) {
        echo "A senha deve ter pelo menos 8 caracteres.";
    } elseif (!preg_match('/[A-Za-z]/', $senha) || !preg_match('/[0-9]/', $senha)) {
        echo "A senha deve conter pelo menos uma letra e um número.";
    } else {
        // Conexão com o banco de dados (substitua os valores conforme sua configuração)
        $servername = "localhost";
        $username = "root";
        $password = "-951753/8520+654";
        $dbname = "cadastro";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão com o banco de dados
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Prepara a instrução SQL para inserção
        $sql = "INSERT INTO usuarios (nome, sobrenome, cpf, cep, email, senha) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepara a declaração SQL
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo "Erro na preparação da consulta.";
        } else {
            // Faz o bind dos parâmetros
            $stmt->bind_param("ssssss", $nome, $sobrenome, $cpf, $cep, $email, $senha);

            // Executa a instrução SQL
            if ($stmt->execute()) {
                echo "Cadastro bem-sucedido!";
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }

            // Fecha a declaração e a conexão
            $stmt->close();
            $conn->close();
        }
    }
}
?>
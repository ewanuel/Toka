Copy code
<?php

$db_file = 'banco_de_cadastro.db';

$conn = new SQLite3($db_file);

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . $conn->lastErrorMsg());
}

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
    } else {
        if (preg_match('/[A-Za-z]/', $senha) && preg_match('/[0-9]/', $senha)) {
            echo "Senha válida. Força da senha: ";
            if (strlen($senha) >= 14) {
                echo "Forte";
            } elseif (strlen($senha) >= 10) {
                echo "Média";
            } else {
                echo "Fraca";
            }

            // Consulta SQL para inserir dados na tabela de usuários
            $sql = "INSERT INTO tabela_de_usuarios (nome, sobrenome, cpf, cep, email, senha)
                    VALUES (:nome, :sobrenome, :cpf, :cep, :email, :senha)";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':sobrenome', $sobrenome);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':cep', $cep);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);

                if ($stmt->execute()) {
                    echo "<br>Cadastro bem-sucedido!";
                } else {
                    echo "<br>Erro ao inserir dados: " . $conn->lastErrorMsg();
                }

                $stmt->close();
            } else {
                echo "<br>Erro ao preparar a consulta: " . $conn->lastErrorMsg();
            }
        } else {
            echo "Senha inválida, ela deve conter números e letras.";
        }
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>
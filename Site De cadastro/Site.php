<?php
// Verifica se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Conexão com o banco de dados (substitua 'localhost', 'usuario', 'senha' e 'nome_do_banco' pelos seus dados reais)
    $conexao = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco');
    
    // Verifica se houve algum erro na conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }
    
    // Query SQL para inserir os dados na tabela 'usuarios' (substitua 'usuarios' pelo nome da sua tabela)
    $query = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
    
    // Executa a query
    if ($conexao->query($query) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }
    
    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    // Se os dados não foram enviados via POST, redireciona para a página de cadastro
    header("Location: cadastro.html");
    exit();
}
?>

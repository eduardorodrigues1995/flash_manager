<?php
// Configuração do log
ini_set('error_log', '/var/log/meu_programa.log');
ini_set('log_errors', 'On');

// Inclua o arquivo de conexão com o banco de dados
include('conexao_db.php');

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Capturar os valores dos campos do formulário
    $cnpj = $_POST['cliente_empresa_cnpj'];
    $razao_social = $_POST['cliente_empresa_razao_social'];
    $situacao_cnpj = $_POST['cliente_empresa_situacao_cnpj'];
    $data_abertura = $_POST['cliente_empresa_data_abertura'];
    $natureza_juridica = $_POST['cliente_empresa_natureza_juridica'];
    $capital_social = $_POST['cliente_empresa_capital_social'];
    $telefone = $_POST['cliente_empresa_telefone'];
    $email = $_POST['cliente_empresa_email'];
    $instagram = $_POST['cliente_empresa_Instagram'];
    $rua = $_POST['cliente_empresa_Rua'];
    $n_complemento = $_POST['cliente_empresa_n_complemento'];
    $bairro = $_POST['cliente_empresa_bairro'];
    $uf = $_POST['cliente_empresa_uf'];
    $cidade = $_POST['cliente_empresa_cidade'];
    $cep = $_POST['cliente_empresa_cep'];

    try {
        // Preparar a consulta SQL para inserir os valores na tabela empresa
        $stmt = $pdo->prepare("
            INSERT INTO empresa 
            (cnpj, razao_social, situacao_cnpj, data_abertura, natureza_juridica, capital_social, telefone, email, instagram, rua, n_complemento, bairro, uf, cidade, cep)
            VALUES 
            (:cnpj, :razao_social, :situacao_cnpj, :data_abertura, :natureza_juridica, :capital_social, :telefone, :email, :instagram, :rua, :n_complemento, :bairro, :uf, :cidade, :cep)
        ");

        // Vincular os valores dos parâmetros com os valores dos campos do formulário
$stmt->bindParam(':cnpj', $cnpj);
$stmt->bindParam(':razao_social', $razao_social);
$stmt->bindParam(':situacao_cnpj', $situacao_cnpj);
$stmt->bindParam(':data_abertura', $data_abertura);
$stmt->bindParam(':natureza_juridica', $natureza_juridica);
$stmt->bindParam(':capital_social', $capital_social);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':instagram', $instagram);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':n_complemento', $n_complemento);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':uf', $uf);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':cep', $cep);

// Executa a consulta SQL com os valores dos parâmetros
$registroInserido = false;
if ($stmt->execute()) {
    // Atribui mensagem de sucesso à variável
    $msg = 'Cadastro realizado com sucesso!';
    $registroInserido = true;
    // Registra mensagem de log
    error_log("Novo registro inserido na tabela empresa: " . print_r($_POST, true));
} else {
    // Atribui mensagem de erro à variável
    $msg = 'Erro ao realizar o cadastro.';
    // Registra mensagem de log
    error_log("Erro ao inserir registro na tabela empresa: " . $stmt->errorInfo()[2]);
}

// Envia a resposta JSON
header('Content-Type: application/json');
echo json_encode(['sucesso' => $registroInserido, 'mensagem' => $msg]);

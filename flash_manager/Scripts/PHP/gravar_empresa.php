<?php
// Incluir arquivo de conexão com o banco de dados
require_once "conexao_db.php";

// Verificar se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados da empresa do formulário
    $cliente_empresa_cnpj = $_POST["cliente_empresa_cnpj"];
    $cliente_empresa_razao_social = $_POST["cliente_empresa_razao_social"];
    $situaçãocnpj = $_POST["situaçãocnpj"];
    $cliente_empresa_data_abertura = $_POST["cliente_empresa_data_abertura"];
    $cliente_empresa_natureza_juridica = $_POST["cliente_empresa_natureza_juridica"];
    $cliente_empresa_capital_social = $_POST["cliente_empresa_capital_social"];
    $cliente_empresa_telefone = $_POST["cliente_empresa_telefone"];
    $cliente_empresa_email = $_POST["cliente_empresa_email"];
    $cliente_empresa_Instagram = $_POST["cliente_empresa_Instagram"];
    $cliente_empresa_rua = $_POST["cliente_empresa_rua"];
    $cliente_empresa_n_complemento = $_POST["cliente_empresa_n_complemento"];
    $cliente_empresa_bairro = $_POST["cliente_empresa_bairro"];
    $cliente_empresa_uf = $_POST["cliente_empresa_uf"];
    $cliente_empresa_cidade = $_POST["cliente_empresa_cidade"];
    $cliente_empresa_cep = $_POST["cliente_empresa_cep"];

    // Preparar a consulta SQL
    $stmt = $pdo->prepare("INSERT INTO pessoa_juridica (cnpj, razao_social, situacao_cnpj, data_abertura, natureza_juridica, capital_social, telefone, email, instagram, rua, n_complemento, bairro, uf, cidade, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        // Vincular os parâmetros da consulta
        $stmt->bind_param("sssssssssssssss", $cliente_empresa_cnpj, $cliente_empresa_razao_social, $situaçãocnpj, $cliente_empresa_data_abertura, $cliente_empresa_natureza_juridica, $cliente_empresa_capital_social, $cliente_empresa_telefone, $cliente_empresa_email, $cliente_empresa_Instagram, $cliente_empresa_rua, $cliente_empresa_n_complemento, $cliente_empresa_bairro, $cliente_empresa_uf, $cliente_empresa_cidade, $cliente_empresa_cep);

        // Executar a consulta SQL
        if ($stmt->execute()) {
            // Log da operação de sucesso
            error_log('Registro de pessoa jurídica inserido com sucesso: CNPJ = ' . $cliente_empresa_cnpj);
            echo json_encode(array("message" => "Registro de pessoa jurídica inserido com sucesso"));
        } else {
            // Log da falha na operação
            error_log('Erro ao inserir registro de pessoa jurídica: ' . $stmt->error);
            echo json_encode(array("message" => "Erro ao inserir registro de pessoa jurídica"));
        }

        // Fechar a declaração
        $stmt->close();

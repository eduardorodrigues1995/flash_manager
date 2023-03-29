<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'conexao_db.php';

// Prepara a consulta SQL
$stmt = $conn->prepare("INSERT INTO pessoa_juridica (cnpj, razao_social, situacao_cnpj, data_abertura, natureza_juridica, capital_social, telefone, email, instagram, rua, n_complemento, bairro, uf, cidade, cep) 
VALUES (:cnpj, :razao_social, :situacao_cnpj, :data_abertura, :natureza_juridica, :capital_social, :telefone, :email, :instagram, :rua, :n_complemento, :bairro, :uf, :cidade, :cep)");

// Vincula os parâmetros
$stmt->bindParam(':cnpj', $_POST['cliente_empresa_cnpj']);
$stmt->bindParam(':razao_social', $_POST['cliente_empresa_razao_social']);
$stmt->bindParam(':situacao_cnpj', $_POST['situacao_cnpj']);
$stmt->bindParam(':data_abertura', $_POST['cliente_empresa_data_abertura']);
$stmt->bindParam(':natureza_juridica', $_POST['cliente_empresa_natureza_juridica']);
$stmt->bindParam(':capital_social', $_POST['cliente_empresa_capital_social']);
$stmt->bindParam(':telefone', $_POST['cliente_empresa_telefone']);
$stmt->bindParam(':email', $_POST['cliente_empresa_email']);
$stmt->bindParam(':instagram', $_POST['cliente_empresa_Instagram']);
$stmt->bindParam(':rua', $_POST['cliente_empresa_rua']);
$stmt->bindParam(':n_complemento', $_POST['cliente_empresa_n_complemento']);
$stmt->bindParam(':bairro', $_POST['cliente_empresa_bairro']);
$stmt->bindParam(':uf', $_POST['cliente_empresa_uf']);
$stmt->bindParam(':cidade', $_POST['cliente_empresa_cidade']);
$stmt->bindParam(':cep', $_POST['cliente_empresa_cep']);

// Executa a consulta
$stmt->execute();

echo "Registro inserido com sucesso!";
?>

<?php
// Configuração do log
ini_set('error_log', '/var/log/meu_programa.log');
ini_set('log_errors', 'On');

// Inclua o arquivo de conexão com o banco de dados
include('conexao_db.php');

// Inicialize a variável de mensagem
$msg = '';

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Capturar os valores dos campos do formulário
  $cnpj = $_POST['cliente_empresa_cnpj'];
  $razao_social = $_POST['cliente_empresa_razao_social'];
  $situacao_cnpj = $_POST['situaçãocnpj'];
  $data_abertura = $_POST['cliente_empresa_data_abertura'];
  $natureza_juridica = $_POST['cliente_empresa_natureza_juridica'];
  $capital_social = $_POST['cliente_empresa_capital_social'];
  $telefone = $_POST['cliente_empresa_telefone'];
  $email = $_POST['cliente_empresa_email'];
  $instagram = $_POST['cliente_empresa_Instagram'];
  $rua = $_POST['cliente_empresa_rua'];
  $n_complemento = $_POST['cliente_empresa_n_complemento'];
  $bairro = $_POST['cliente_empresa_bairro'];
  $uf = $_POST['cliente_empresa_uf'];
  $cidade = $_POST['cliente_empresa_cidade'];
  $cep = $_POST['cliente_empresa_cep'];

  // Preparar a consulta SQL para inserir os valores na tabela pessoa_juridica
  $stmt = $pdo->prepare("
    INSERT INTO pessoa_juridica 
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

  // Executar a consulta SQL
$registroInserido = false;
if ($stmt->execute()) {
  // Atribuir mensagem de sucesso à variável
  $msg = 'Cadastro realizado com sucesso!';

  // Redirecionar o usuário para outra página
  header('Location: /pagina-de-sucesso.php');
  exit;
} else {
  // Atribuir mensagem de erro à variável
  $msg = 'Erro ao realizar o cadastro.';
  // Registrar mensagem de log
  error_log("Erro ao inserir registro na tabela pessoa_juridica: " . $stmt->errorInfo()[2]);
}
}

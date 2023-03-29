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
	
	var_dump($_POST); // Adicionar essa linha para verificar se o valor do campo "tipo_documento" está presente

  // Capturar os valores dos campos do formulário
  $nome_completo = $_POST['cliente_pessoa_fisica_nomecompleto'];
  $nacionalidade = $_POST['cliente_pessoa_fisica_nacionalidade'];
  $genero = $_POST['cliente_pessoa_fisica_genero'];
  $estado_civil = $_POST['cliente_pessoa_fisica_estadocivil'];
  $data_nascimento = $_POST['cliente_pessoa_fisica_data_nascimento'];
  $telefone = $_POST['cliente_pessoa_fisica_telefone'];
  $email = $_POST['cliente_pessoa_fisica_email'];
  $instagram = $_POST['cliente_pessoa_fisica_Instagram'];
  $rua = $_POST['cliente_pessoa_fisica_Rua'];
  $n_complemento = $_POST['cliente_pessoa_fisica_n_complemento'];
  $bairro = $_POST['cliente_pessoa_fisica_bairro'];
  $uf = $_POST['cliente_pessoa_fisica_uf'];
  $cidade = $_POST['cliente_pessoa_fisica_cidade'];
  $cep = $_POST['cliente_pessoa_fisica_cep'];
  $cpf = $_POST['cliente_pessoa_fisica_cpf'];
  $tipo_documento = $_POST['cliente_pessoa_fisica_tipo_doc'];
  $orgao_emissor = $_POST['cliente_pessoa_fisica_orgao_emissor'];
  $numero_documento = $_POST['cliente_pessoa_fisica_numero_documento'];

   // Preparar a consulta SQL para inserir os valores na tabela pessoa_fisica
  $stmt = $pdo->prepare("
    INSERT INTO pessoa_fisica 
      (nome_completo, nacionalidade, genero, estado_civil, data_nascimento, telefone, email, instagram, rua, n_complemento, bairro, uf, cidade, cep, cpf, tipo_documento, orgao_emissor, numero_documento)
    VALUES 
      (:nome_completo, :nacionalidade, :genero, :estado_civil, :data_nascimento, :telefone, :email, :instagram, :rua, :n_complemento, :bairro, :uf, :cidade, :cep, :cpf, :tipo_documento, :orgao_emissor, :numero_documento)
  ");

  // Vincular os valores dos parâmetros com os valores dos campos do formulário
  $stmt->bindParam(':nome_completo', $nome_completo);
  $stmt->bindParam(':nacionalidade', $nacionalidade);
  $stmt->bindParam(':genero', $genero);
  $stmt->bindParam(':estado_civil', $estado_civil);
  $stmt->bindParam(':data_nascimento', $data_nascimento);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':instagram', $instagram);
  $stmt->bindParam(':rua', $rua);
  $stmt->bindParam(':n_complemento', $n_complemento);
  $stmt->bindParam(':bairro', $bairro);
  $stmt->bindParam(':uf', $uf);
  $stmt->bindParam(':cidade', $cidade);
  $stmt->bindParam(':cep', $cep);
  $stmt->bindParam(':cpf', $cpf);
  $stmt->bindParam(':tipo_documento', $tipo_documento);
  $stmt->bindParam(':orgao_emissor', $orgao_emissor);
  $stmt->bindParam(':numero_documento', $numero_documento);

  // Executar a consulta SQL
  $registroInserido = false;
  if ($stmt->execute()) {
      // Atribuir mensagem de sucesso à variável
      $msg = 'Cadastro realizado com sucesso!';
      $registroInserido = true;
      // Registrar mensagem de log
      error_log("Novo registro inserido na tabela pessoa_fisica: " . print_r($_POST, true));
  } else {
      // Atribuir mensagem de erro à variável
      $msg = 'Erro ao realizar o cadastro.';
      // Registrar mensagem de log
      error_log("Erro ao inserir registro na tabela pessoa_fisica: " . $stmt->errorInfo()[2]);
  }

  // Envie a resposta JSON
  header('Content-Type: application/json');
  echo json_encode(['sucesso' => $registroInserido, 'mensagem' => $msg]);
}
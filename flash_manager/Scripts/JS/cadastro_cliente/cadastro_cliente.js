// Função para lidar com erros em todas as solicitações fetch
function handleErrors(response) {
  if (!response.ok) {
    throw new Error(response.statusText);
  }
  return response.json();
}

// Enviar o formulário Pessoa Física
var formDataPessoaFisica = new FormData(document.getElementById("formPessoaFisica"));
fetch("http://localhost/flash_manager/scripts/PHP/gravar_pessoa_fisica.php", {
  method: "POST",
  body: formDataPessoaFisica,
})
  .then(handleErrors)
  .then(function(responseData) {
    console.log("Formulário Pessoa Física enviado com sucesso:", responseData);
    // Adicione uma mensagem de confirmação aqui, se necessário
  })
  .catch(function(error) {
    console.error("Erro ao enviar o formulário Pessoa Física:", error);
    // Exiba uma mensagem de erro ao usuário de forma adequada
  });

// Enviar o formulário Responsável Legal
var formDataResponsavelLegal = new FormData(document.getElementById("formResponsavelLegal"));
fetch("http://localhost/flash_manager/scripts/PHP/gravar_responsavel_legal.php", {
  method: "POST",
  body: formDataResponsavelLegal,
})
  .then(handleErrors)
  .then(function(responseData) {
    console.log("Formulário Responsável Legal enviado com sucesso:", responseData);
    // Adicione uma mensagem de confirmação aqui, se necessário
  })
  .catch(function(error) {
    console.error("Erro ao enviar o formulário Responsável Legal:", error);
    // Exiba uma mensagem de erro ao usuário de forma adequada
  });

// Enviar o formulário Empresa
var formDataEmpresa = new FormData(document.getElementById("formEmpresa"));
fetch("http://localhost/flash_manager/scripts/PHP/gravar_empresa.php", {
  method: "POST",
  body: formDataEmpresa,
})
  .then(handleErrors)
  .then(function(responseData) {
    console.log("Formulário Empresa enviado com sucesso:", responseData);
    // Adicione uma mensagem de confirmação aqui, se necessário
  })
  .catch(function(error) {
    console.error("Erro ao enviar o formulário Empresa:", error);
    // Exiba uma mensagem de erro ao usuário de forma adequada
  });

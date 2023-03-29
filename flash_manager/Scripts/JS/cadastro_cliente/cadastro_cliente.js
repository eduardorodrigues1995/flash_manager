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
  .then(function(response) {
    return response.json(); // Altera a resposta para um JSON
  })
  .then(function(json) {
    console.log("JSON obtido com sucesso:", json);
  })
  .catch(function(error) {
    console.error("Erro ao enviar o formulário Pessoa Física:", error);
    console.error("Mensagem do erro:", error.message);
    console.error("Pilha de chamadas:", error.stack);
  });

// Enviar o formulário Responsável Legal
var formDataResponsavelLegal = new FormData(document.getElementById("formResponsavelLegal"));
fetch("http://localhost/flash_manager/scripts/PHP/gravar_responsavel_legal.php", {
  method: "POST",
  body: formDataResponsavelLegal,
})
  .then((response) => response.json())
  .then(function(data) {
    console.log("Formulário Responsável Legal enviado com sucesso:", data);
  })
  .catch(function(error) {
    console.error("Erro ao enviar o formulário Responsável Legal:", error);
    console.error("Mensagem do erro:", error.message);
    console.error("Pilha de chamadas:", error.stack);
  });

// Enviar o formulário Empresa
var formDataEmpresa = new FormData(document.getElementById("formEmpresa"));
fetch("http://localhost/flash_manager/scripts/PHP/gravar_empresa.php", {
  method: "POST",
  body: formDataEmpresa,
})
  .then(function(response) {
    if (!response.ok) {
      throw new Error("Erro ao enviar o formulário Empresa: " + response.statusText);
    }
    return response.json();
  })
  .then(function(data) {
    console.log("Formulário Empresa enviado com sucesso:", data);
  })
  .catch(function(error) {
    console.error("Erro ao enviar o formulário Empresa:", error);
    console.error("Mensagem do erro:", error.message);
    console.error("Pilha de chamadas:", error.stack);
  });
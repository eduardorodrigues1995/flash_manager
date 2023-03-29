function formatCEP(input) {
  var cep = input.value;
  cep = cep.replace(/\D/g, ''); // remove todos os caracteres não numéricos
  cep = cep.substring(0, 8); // limita o campo a 8 dígitos
  
  if (cep.length > 5) {
    cep = cep.substring(0, 5) + "-" + cep.substring(5);
  }
  
  input.value = cep;
}

// Formato CPF
function formatCPF(input) {
  var cpf = input.value;
  cpf = cpf.replace(/\D/g, ''); // remove todos os caracteres não numéricos
  cpf = cpf.substring(0, 11); // limita o campo a 11 dígitos
  
  if (cpf.length > 9) {
    cpf = cpf.substring(0, 3) + "." + cpf.substring(3, 6) + "." + cpf.substring(6, 9) + "-" + cpf.substring(9);
  }
  
  input.value = cpf;
}

// Converter data para o formato DD/MM/AAAA
function formataData(dataformatar) {
    let data = new Date(dataformatar);
    return data.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
}

function formatPhone(element) {
  // Remove tudo que não é número do valor do input
  let numbers = element.value.replace(/\D/g, '');

  // Formata o número do telefone para o formato (##) #####-####
  numbers = numbers.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');

  // Atualiza o valor do input
  element.value = numbers;
}

function addAtSymbol(inputId) {
  var instagramInput = document.getElementById(inputId);
  var currentValue = instagramInput.value;
  if (currentValue && !currentValue.startsWith("@")) {
    instagramInput.value = "@" + currentValue;
  }
}

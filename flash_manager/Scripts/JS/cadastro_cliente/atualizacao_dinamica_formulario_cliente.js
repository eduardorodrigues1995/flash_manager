// Função para atualizar as opções de estado civil
function atualizarEstadoCivil() {
  // Seleciona os elementos de gênero e estado civil de pessoa física
  let generoPf = document.getElementById("cliente_pessoa_fisica_genero");
  let estadoCivilPf = document.getElementById("cliente_pessoa_fisica_estadocivil");
  
  // Seleciona os elementos de gênero e estado civil do responsável legal
  let generoRl = document.getElementById("cliente_pessoa_fisica_responsavel_legal_genero");
  let estadoCivilRl = document.getElementById("cliente_pessoa_fisica_responsavel_legal_estado_civil");

  // Limpa as opções de estado civil de ambos os selects
  estadoCivilPf.innerHTML = "";
  estadoCivilRl.innerHTML = "";

  // Adiciona as opções de acordo com o gênero selecionado em pessoa física
  if (generoPf.value === "Feminino") {
    estadoCivilPf.innerHTML += "<option value='solteira'>Solteira</option>";
    estadoCivilPf.innerHTML += "<option value='casada'>Casada</option>";
    estadoCivilPf.innerHTML += "<option value='uniao estavel'>União Estável</option>";
    estadoCivilPf.innerHTML += "<option value='divorciada'>Divorciada</option>";
    estadoCivilPf.innerHTML += "<option value='viuva'>Viúva</option>";
  } else {
    estadoCivilPf.innerHTML += "<option value='solteiro'>Solteiro</option>";
    estadoCivilPf.innerHTML += "<option value='casado'>Casado</option>";
    estadoCivilPf.innerHTML += "<option value='uniao estavel'>União Estável</option>";
    estadoCivilPf.innerHTML += "<option value='divorciado'>Divorciado</option>";
    estadoCivilPf.innerHTML += "<option value='viuvo'>Viúvo</option>";
  }

  // Adiciona as opções de acordo com o gênero selecionado no responsável legal
  if (generoRl.value === "Feminino") {
    estadoCivilRl.innerHTML += "<option value='solteira'>Solteira</option>";
    estadoCivilRl.innerHTML += "<option value='casada'>Casada</option>";
    estadoCivilRl.innerHTML += "<option value='uniao estavel'>União Estável</option>";
    estadoCivilRl.innerHTML += "<option value='divorciada'>Divorciada</option>";
    estadoCivilRl.innerHTML += "<option value='viuva'>Viúva</option>";
  } else {
    estadoCivilRl.innerHTML += "<option value='solteiro'>Solteiro</option>";
    estadoCivilRl.innerHTML += "<option value='casado'>Casado</option>";
    estadoCivilRl.innerHTML += "<option value='uniao estavel'>União Estável</option>";
    estadoCivilRl.innerHTML += "<option value='divorciado'>Divorciado</option>";
    estadoCivilRl.innerHTML += "<option value='viuvo'>Viúvo</option>";
  }
}

// Adiciona o evento de mudança de valor para os selects de gênero
cliente_pessoa_fisica_genero.addEventListener("change", function() {
let estadoCivilOptions = cliente_pessoa_fisica_estadocivil.options;

// Limpa todas as opções
estadoCivilOptions.length = 0;

// Adiciona as opções correspondentes ao gênero selecionado
if (this.value === "Feminino") {
estadoCivilOptions.add(new Option("Solteira", "Solteira"));
estadoCivilOptions.add(new Option("Casada", "Casada"));
estadoCivilOptions.add(new Option("Viúva", "Viúva"));
estadoCivilOptions.add(new Option("Divorciada", "Divorciada"));
estadoCivilOptions.add(new Option("União Estável", "União Estável"));
} else if (this.value === "Masculino") {
estadoCivilOptions.add(new Option("Solteiro", "Solteiro"));
estadoCivilOptions.add(new Option("Casado", "Casado"));
estadoCivilOptions.add(new Option("Viúvo", "Viúvo"));
estadoCivilOptions.add(new Option("Divorciado", "Divorciado"));
estadoCivilOptions.add(new Option("União Estável", "União Estável"));
}
});

// Adiciona o evento de mudança de valor para os selects de gênero do responsável legal
cliente_pessoa_fisica_responsavel_legal_genero.addEventListener("change", function() {
let estadoCivilOptions = cliente_pessoa_fisica_responsavel_legal_estado_civil.options;

// Limpa todas as opções
estadoCivilOptions.length = 0;

// Adiciona as opções correspondentes ao gênero selecionado
if (this.value === "Feminino") {
estadoCivilOptions.add(new Option("Solteira", "Solteira"));
estadoCivilOptions.add(new Option("Casada", "Casada"));
estadoCivilOptions.add(new Option("Viúva", "Viúva"));
estadoCivilOptions.add(new Option("Divorciada", "Divorciada"));
estadoCivilOptions.add(new Option("União Estável", "União Estável"));
} else if (this.value === "Masculino") {
estadoCivilOptions.add(new Option("Solteiro", "Solteiro"));
estadoCivilOptions.add(new Option("Casado", "Casado"));
estadoCivilOptions.add(new Option("Viúvo", "Viúvo"));
estadoCivilOptions.add(new Option("Divorciado", "Divorciado"));
estadoCivilOptions.add(new Option("União Estável", "União Estável"));
}
});
  
let generoPf = document.getElementById("cliente_pessoa_fisica_genero");
let estadoCivilPf = document.getElementById("cliente_pessoa_fisica_estadocivil");

atualizarEstadoCivil(); // Chama a função para atualizar o estado civil logo ao carregar a página

let generoRl = document.getElementById("cliente_pessoa_fisica_responsavel_legal_genero");
let estadoCivilRl = document.getElementById("cliente_pessoa_fisica_responsavel_legal_estado_civil");
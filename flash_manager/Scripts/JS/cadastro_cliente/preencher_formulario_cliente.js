// Preenchimento automático nos campos baseado no cnpj da empresa do cliente.
document.addEventListener('DOMContentLoaded', function() {
  const token = '4e3154883d5a012943fc90e512fdf076472a7223f322248d735143823e3b6f22';
  const inputCNPJ = document.getElementById('cliente_empresa_cnpj');
  
  inputCNPJ.addEventListener('blur', async function() {
    const cnpj = inputCNPJ.value;
    if (cnpj) {
      try {
        const response = await fetch(`https://www.receitaws.com.br/v1/cnpj/${cnpj}?token=${token}`);
        const data = await response.json();

        if (data.status === 'ERROR') {
          alert(data.message);
        } else {
          preencherFormulario(data);
        }
      } catch (error) {
        alert('Erro ao buscar informações do CNPJ.');
      }
    }
  });

  function preencherFormulario(data) {
    document.getElementById('cliente_empresa_razao_social').value = data.nome;
    document.getElementById('situaçãocnpj').value = data.situacao;
    document.getElementById('cliente_empresa_data_abertura').value = data.abertura.split('/').reverse().join('-');
    document.getElementById('cliente_empresa_natureza_juridica').value = data.natureza_juridica;
    document.getElementById('cliente_empresa_capital_social').value = data.capital_social;
    document.getElementById('cliente_empresa_telefone').value = data.telefone;
    document.getElementById('cliente_empresa_email').value = data.email;
    document.getElementById('cliente_empresa_Instagram').value = ''; // Instagram não disponível na API
    document.getElementById('cliente_empresa_rua').value = data.logradouro;
    document.getElementById('cliente_empresa_n_complemento').value = `${data.numero} ${data.complemento}`;
    document.getElementById('cliente_empresa_bairro').value = data.bairro;
    document.getElementById('cliente_empresa_uf').value = data.uf;
    document.getElementById('cliente_empresa_cidade').value = data.municipio;
    document.getElementById('cliente_empresa_cep').value = data.cep;
  }
});


// Preenchimento automático nos campos de endereço baseado no CEP.
function buscarEndereco(cep, ruaId, ufId, cidadeId, bairroId) {
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(endereco => {
            document.getElementById(ruaId).value = endereco.logradouro;
            document.getElementById(ufId).value = endereco.uf;
            document.getElementById(cidadeId).value = endereco.localidade;
            document.getElementById(bairroId).value = endereco.bairro;
        });
}

document.getElementById("cliente_pessoa_fisica_cep").addEventListener("input", function(event) {
    let cep = event.target.value.replace(/\D/g, "");
    if (cep.length === 8) {
        buscarEndereco(cep, "cliente_pessoa_fisica_Rua", "cliente_pessoa_fisica_uf", "cliente_pessoa_fisica_cidade", "cliente_pessoa_fisica_bairro");
    }
});

document.getElementById("cliente_empresa_cep").addEventListener("input", function(event) {
    let cep = event.target.value.replace(/\D/g, "");
    if (cep.length === 8) {
        buscarEndereco(cep, "cliente_empresa_rua", "cliente_empresa_uf", "cliente_empresa_cidade", "cliente_empresa_bairro");
    }
});

document.getElementById("cliente_pessoa_fisica_responsavel_legal_cep").addEventListener("input", function(event) {
    let cep = event.target.value.replace(/\D/g, "");
    if (cep.length === 8) {
        buscarEndereco(cep, "cliente_pessoa_fisica_responsavel_legal_rua", "cliente_pessoa_fisica_responsavel_legal_uf", "cliente_pessoa_fisica_responsavel_legal_cidade", "cliente_pessoa_fisica_responsavel_legal_bairro");
    }
});
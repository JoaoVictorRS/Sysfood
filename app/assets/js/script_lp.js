
//Tratamento de cadastro
const nome_empresa_cad = document.getElementById('nome_empresa_cad');


if (nome_empresa_cad.value.length < 3) {
    
}


//Campo CNPJ
const cnpj_cadastro = document.getElementById('cnpj_cadastro');

//Adiciona Formatação de cnpj
cnpj_cadastro.addEventListener('input', formatCNPJ,);

function formatCNPJ() {
  let value = cnpj_cadastro.value.replace(/\D/g, '');
  
  if (value.length > 2) {
    value = value.substring(0, 2) + '.' + value.substring(2);
  }
  if (value.length > 6) {
    value = value.substring(0, 6) + '.' + value.substring(6);
  }
  if (value.length > 10) {
    value = value.substring(0, 10) + '/' + value.substring(10);
  }
  if (value.length > 15) {
    value = value.substring(0, 15) + '-' + value.substring(15);
  }
  
  cnpj_cadastro.value = value;
}

//Verifica o tamanho da entrada de cnpj
cnpj_cadastro.addEventListener('input', tamanhoCNPJ);

function tamanhoCNPJ() {
    if(cnpj_cadastro.value.length != 18 ){
        cnpj_cadastro.style.border = '2px solid #e63636'
    }
    else{
        cnpj_cadastro.style.border = '2px solid green'
    }
}
//Tratamento de cadastro
const form = document.getElementById('cadastro_form');
const campos = document.querySelectorAll('.cadastro-input');
const spans = document.querySelectorAll('.cadastro_span');

function setError(index) {
  campos[index].style.border = '2px solid #e63636';
}

function setSuccess(index) {
  campos[index].style.border = '2px solid green';
}

//Campo Nome da empresa

//Verifica o tamanho do nome
campos[0].addEventListener('input', en_tamanho);

function en_tamanho() {
  let tamanho = campos[0].value.length;
  
  if(tamanho < 3){
    setError(0);
  }else
    setSuccess(0);
}


//Campo CNPJ

//Adiciona Formatação de cnpj
campos[1].addEventListener('input', formatCNPJ,);

function formatCNPJ() {
  let value = campos[1].value.replace(/\D/g, '');
  
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
  
  campos[1].value = value;
}

//Verifica o tamanho da entrada de cnpj
campos[1].addEventListener('input', tamanhoCNPJ);

function tamanhoCNPJ() {
    if(campos[1].value.length != 18 ){
        campos[1].style.border = '2px solid #e63636'
    }
    else{
        campos[1].style.border = '2px solid green'
    }
}
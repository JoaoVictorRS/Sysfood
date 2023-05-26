//Tratamento de cadastro
const form = document.getElementById('cadastro_form');
const campos = document.querySelectorAll('.cadastro-input');
const spans = document.querySelectorAll('.cadastro-span');



function setError(index) {
  campos[index].style.border = '2px solid #e63636';
  spans[index].style.display = 'block';
}

function setSuccess(index) {
  campos[index].style.border = '2px solid green';
  spans[index].style.display = 'none';
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
campos[1].addEventListener('input', formatCNPJ);

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
        setError(1);
    }
    else{
        setSuccess(1);
    }
}

//Campo E-mail

//Verifica se e um email de formato valido
campos[2].addEventListener('input', validEmail);

function validEmail() {

  let emailRegex = /^[\w\.-]+@[\w\.-]+\.\w+$/;

  if (!emailRegex.test(campos[2].value)) {
    setError(2);
  }else{
    setSuccess(2); 
  }
  
}

//Campo Senha

//Verifica se e a senha cumpre com os requisitos
campos[3].addEventListener('input', validSenha);

function validSenha() {

  let senhaRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;

  if (!senhaRegex.test(campos[3].value)) {
    setError(3);
  }else{
    setSuccess(3); 
  }
  
}

//Campo CEP

//Formata o input de CEP

campos[8].addEventListener('input', formatCEP);

function formatCEP() {
  let value = campos[8].value.replace(/\D/g, '');
  
  if (value.length > 5) {
    value = value.substring(0, 5) + '-' + value.substring(5);
  }
  
  campos[8].value = value;
}

//Valida o tamanho do cep

campos[8].addEventListener('input', cepTamanho);

function cepTamanho() {
  let tamanho = campos[8].value.length;
  
  if(tamanho < 9){
    setError(8);
  }else
    setSuccess(8);
}
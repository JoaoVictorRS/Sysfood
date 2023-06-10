//Esses codigos aqui servem para mudar a cor das opçoes do left menu quando sao selecionadas

const opcoes = document.querySelectorAll('.menu-item');


//PAGINAS PRINCIPAIS
if (window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php") {
    opcoes[0].classList.add('active')
}else{
    opcoes[0].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index_finalizado.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/create.php") {
    opcoes[2].classList.add('active')
    opcoes[1].classList.add('active')
}else{
    opcoes[2].classList.remove('active')
    opcoes[1].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index_finalizado.php") {
    opcoes[3].classList.add('active')
    opcoes[2].classList.remove('active')
}else{
    opcoes[3].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php" || window.location.href == "http://localhost/Sysfood/app/views/produtos/create.php") {
    opcoes[4].classList.add('active')
}else{
    opcoes[4].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php" || window.location.href == "http://localhost/Sysfood/app/views/categorias/create.php") {
    opcoes[5].classList.add('active')
}else{
    opcoes[5].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/create.php" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/edit.php?id=") {
    opcoes[6].classList.add('active')
}else{
    opcoes[6].classList.remove('active')
}

//SUB-PAGINAS DAS PAGINAS PRINCIPAIS (isso aq parece ser uma pessima forma de se fazer isso mas é o unico jeito q funciona XGH)
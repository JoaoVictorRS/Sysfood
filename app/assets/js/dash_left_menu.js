//Esses codigos aqui servem para mudar a cor das opçoes do left menu quando sao selecionadas

//Empresa, gerente e supervisor
const opcoes = document.querySelectorAll('.menu-item');

//PAGINAS PRINCIPAIS
if (window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php" || window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php?login_sucesso" || window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php?registro_sucesso") {
    opcoes[0].classList.add('active')
}else{
    opcoes[0].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index_finalizado.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/create.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?nova_sessao_criada" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_finalizada" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_editada" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_deletada") {
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

if (window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/create.php" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php?funcionario_editado" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php?funcionario_deletado") {
    opcoes[4].classList.add('active')
}else{
    opcoes[4].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php" || window.location.href == "http://localhost/Sysfood/app/views/produtos/create.php" || window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php?produto_deletado") {
    opcoes[5].classList.add('active')
}else{
    opcoes[5].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php" || window.location.href == "http://localhost/Sysfood/app/views/categorias/create.php" || window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php?categoria_editada" || window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php?categoria_deletada") {
    opcoes[6].classList.add('active')
}else{
    opcoes[6].classList.remove('active')
}

//Funcionario Comum e cozinha
const prod_func = document.querySelector('#')

if (window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php") {
    menu_func[0].classList.add('active');
}else
    menu_func[0].classList.remove('active'); 

if (window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php") {
    menu_func[1].classList.add('active');
}else
    menu_func[1].classList.remove('active');  
//Alertas Dashboard (bem_vindo.php)

//Alerta apos registrar pela primeira vez
if (window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php?registro_sucesso") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: 'success',
    title: 'Bem vindo ao Sysfood!'
  })
}

//Alerta ao fazer login
if (window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php?login_sucesso") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: 'success',
    title: 'Bem vindo novamente!'
  })
}



//Alertas em Sessao

//Alerta ao criar uma nova sessão
if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?nova_sessao_criada") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
      
  Toast.fire({
    icon: 'success',
    title: 'Nova Sessão Criada!'
  })
}

//Alerta ao excluir sessão(excluir faltando fazer)

//Alerta ao editar sessão
if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_editada") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
      
  Toast.fire({
    icon: 'success',
    title: 'Sessão Editada!'
  })
}

//Alerta ao finalizar sessão
if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_finalizada") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
      
  Toast.fire({
    icon: 'success',
    title: 'Sessão Finalizada!'
  })
}

//Alerta ao excluir sessão finalizada(esses excluir tao complicado)



//Alertas em Produto(quando arrumar faço)



//Alertas em Categoria

//Alerta ao criar categoria
if (window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php?categoria_criada") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
      
  Toast.fire({
    icon: 'success',
    title: 'Categoria Criada!'
  })
}

//Alerta ao excluir categoria(INFERNOOOOOOOOOOOOOOOOOOOOOOOOOOOO)


//Alerta ao editar categoria
if (window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php?categoria_editada") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
      
  Toast.fire({
    icon: 'success',
    title: 'Categoria Editada!'
  })
}



//Alertas em Funcionarios

//Alerta ao criar funcionario

if (window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php?funcionario_criado") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
      
  Toast.fire({
    icon: 'success',
    title: 'Funcionario Cadastrado!'
  })
}

//Alerta ao editar funcionario
if (window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php?funcionario_editado") {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
      
  Toast.fire({
    icon: 'success',
    title: 'Funcionario Atualizado!'
  })
}

//Alerta ao excluir funcionario(eeeeeeeeeeeee)

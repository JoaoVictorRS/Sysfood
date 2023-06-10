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

//Alerta ao excluir sessão

//Alerta ao editar sessão

//Alerta ao finalizar sessão

//Alerta ao excluir sessão finalizada



//Alertas em Produto



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
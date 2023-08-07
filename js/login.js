$("#btn_iniciar_session").on("click", function () {
  if ($frmLogin.valid()) {

    
     
    $.post("./manejadores/manejadorlogin.php",{pass:btoa($("#pass").val()),email:$("#email").val()},function(data){
        

        if(data["codigo"]==0){
            
                $(document).Toasts('create', {
                  class: 'bg-success',
                  title: '',
                 
                  body: data["mensaje"]
                });

            let pagina=data.nombre_perfil.toLowerCase();
                
                window.location=`./${pagina}.php`;

           
        }else{
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: '',
               
                body: data["mensaje"]
              })
        }
    },"json")


  }
});
/*
 
 $('.toastsDefaultSuccess').click(function() {
            $(document).Toasts('create', {
              class: 'bg-success',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        })
 
 */

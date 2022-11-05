$(function() {
    console.log("Jquery is working");

    $('#invalida').hide();
    $('#login-form').submit(function(e) {
        const postData = {
          usuario: $('#usuario').val(),
          clave: $('#clave').val(),
        };
        $.post('ingreso_sistema.php', postData, function(response) {
        //console.log(response);
        if(response>0) {
           $('#invalida').hide(); 
           swal("Bienvenido al Sistema!", "Usuario y Contraseña validados");
           window.location.href = "index.php";
        } else{
            $('#invalida').show();
            swal("Error de Ingreso!", "...usuario y/o contraseña invalidos!");
        }
        });
        e.preventDefault();
  
     })

})     
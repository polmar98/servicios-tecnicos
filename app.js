$(function() {
   console.log("Jquery is working");
   let idregistro = 0;
   actualizarLista();

   $('#resultado').hide();
   $('#search').keyup(function(e) {
      let search = $('#search').val();
      $.ajax({
           url: 'clientes_busquedas.php',
           type: 'POST',
           data: {search},
           success: function(response) {
              let clientes = JSON.parse(response);
              let template = '';
              clientes.forEach(element => {
                  template += `<tr cliId="${element.id}">
                  <td>${element.id}</td>
                  <td>${element.razon}</td>
                  <td>${element.documento}</td>
                  <td>${element.direccion}</td>
                  <td>${element.telefono}</td>
                  <td><button class="cliente-delete btn btn-danger">Eliminar</button></td>
                  </tr>`
              });
              $('#clientes').html(template);

              //template += `<li>${element.razon}</li>`
              //});
              //$('#resultado').show();
              //$('#contenido').html(template);
           }
      })

   })

   $('#cliente-form').submit(function(e) {
      const postData = {
        apellidos: $('#apellidos').val(),
        nombres: $('#nombres').val(),
        documento: $('#nit').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val(),
        email: $('#email').val(),
        xid: idregistro
      };
      if(confirm('Esta seguro de actualizar datos?')) {
         $.post('clientes_add.php', postData, function(response) {
            console.log(response);
            actualizarLista();
            $('#cliente-form').trigger('reset');
            idregistro = 0;
        });
        e.preventDefault();
      }

   })

   function actualizarLista() {
      $.ajax({
        url: 'clientes_listar.php',
        type: 'GET',
        success: function(response) {
           let clientes = JSON.parse(response);
           let template = '';
           clientes.forEach(element => {
              template += `<tr cliId="${element.id}">
                 <td>${element.id}</td>
                 <td><a href="#" class="cliente-edit">${element.razon}</a></td>
                 <td>${element.documento}</td>
                 <td>${element.direccion}</td>
                 <td>${element.telefono}</td>
                 <td><button class="cliente-delete btn btn-danger">Eliminar</button></td>
              </tr>`
           });
           $('#clientes').html(template);
        }
      })
   }

   $(document).on('click', '.cliente-delete', function() {
      if(confirm('Esta seguro de eliminar registro?')) {
         let element = $(this)[0].parentElement.parentElement;
         let id = $(element).attr('cliId');
         $.post('clientes_delete.php', {id}, function(response) {
            console.log(response);
            actualizarLista();
         });
      }
  
   });

   $(document).on('click', '.cliente-edit', function() {
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr('cliId');
      $.post('clientes_unico.php', {id}, function(response) {
         let clientes = JSON.parse(response);
         $('#apellidos').val(clientes.apellidos);
         $('#nombres').val(clientes.nombres);
         $('#nit').val(clientes.documento);
         $('#direccion').val(clientes.direccion);
         $('#telefono').val(clientes.telefono);
         $('#email').val(clientes.email);
         idregistro = clientes.id;
      });
   }) 

});
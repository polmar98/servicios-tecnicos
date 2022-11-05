$(function() {
    ListaServicios()

    function ListaServicios() {
        $.ajax({
          url: 'servicios_listar.php',
          type: 'GET',
          success: function(response) {
             let clientes = JSON.parse(response);
             let template = '';
             clientes.forEach(element => {
                template += `<tr cliId="${element.id}">
                   <td>${element.orden}</td>
                   <td>${element.nitem}</td>
                   <td>${element.fecha}</td>
                   <td>${element.cliente}</td>
                   <td>${element.equipo}</td>
                   <td>${element.tecnico}</td>
                   <td>${element.nestado}</td>
                   <td><a href="editar_servicio.php?iditem=${element.id}"><button class="servicio-editar btn btn-info">Editar</button></a></td>
                </tr>`
             });
             $('#sertecnicos').html(template);
         }
        })
     }

})    
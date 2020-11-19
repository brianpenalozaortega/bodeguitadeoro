        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<!-- jQuery Print -->
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.12.1 -->
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script>
$(document).ready(function () {
    var base_url= "<?php echo base_url(); ?>";
    var yearactual = (new Date).getFullYear();

    $(".btn-remove-categoria").on("click", function(e){
        //Para evitar que se haga la accion del href
        e.preventDefault();
        //alert("eliminando");
        ///////
        //En la linea de abajo se captura el valor de href
        var ruta = $(this).attr("href");
        //El alert imprime
        //http://localhost/myshop/categoria/delete/2
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //alert(resp);
                //http://localhost/MyShop/categoria
                window.location.href = base_url + resp;
            }
        });
        ///////
    });
    $(".btn-view-categoria").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "Categoria/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }
        });
    });
    $('#tableCategoriaList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


    $(".btn-remove-cliente").on("click", function(e){
        //Para evitar que se haga la accion del href
        e.preventDefault();
        //alert("eliminando");
        ///////
        //En la linea de abajo se captura el valor de href
        var ruta = $(this).attr("href");
        //El alert imprime
        //http://localhost/myshop/cliente/delete/2
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //alert(resp);
                //http://localhost/MyShop/cliente
                window.location.href = base_url + resp;
            }
        });
        ///////
    });
    $(".btn-view-cliente").on("click", function(){
        var cliente = $(this).val();
        //alert(cliente);
        var infocliente = cliente.split("*");
        html = "<p><strong>Nombres: </strong>"+infocliente[1]+"</p>"
        html += "<p><strong>Apellidos: </strong>"+infocliente[2]+"</p>"
        html += "<p><strong>Telefono:  </strong>"+infocliente[3]+"</p>"
        html += "<p><strong>Direccion: </strong>"+infocliente[4]+"</p>"
        html += "<p><strong>Correo: </strong>"+infocliente[5]+"</p>"
        html += "<p><strong>Documento: </strong>"+infocliente[6]+"</p>";
        html += "<p><strong>Tipo de Cliente: </strong>"+infocliente[7]+"</p>"
        html += "<p><strong>Tipo de Documento: </strong>"+infocliente[8]+"</p>";
        $("#modal-default .modal-body").html(html);
    });
    $('#tableClienteList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


    $(".btn-remove-producto").on("click", function(e){
        //Para evitar que se haga la accion del href
        e.preventDefault();
        //alert("eliminando");
        ///////
        //En la linea de abajo se captura el valor de href
        var ruta = $(this).attr("href");
        //El alert imprime
        //http://localhost/myshop/producto/delete/2
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //alert(resp);
                //http://localhost/MyShop/producto
                window.location.href = base_url + resp;
            }
        });
        ///////
    });
    $(".btn-view-producto").on("click", function(){
        var producto = $(this).val();
        //alert(producto);
        var infoproducto = producto.split("*");
        html = "<p><strong>Nombre: </strong>"+infoproducto[1]+"</p>"
        html += "<p><strong>Precio: </strong>"+infoproducto[2]+"</p>"
        html += "<p><strong>Stock: </strong>"+infoproducto[3]+"</p>"
        html += "<p><strong>Imagen: </strong></p>"
        html += "<img src='"+infoproducto[6]+"assets/template/imagenes/"+infoproducto[4]+"' style='height:200px;'>"
        html += "<p><strong>Categoria: </strong>"+infoproducto[5]+"</p>";
        $("#modal-default .modal-body").html(html);
    });
    $('#tableProductoList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


    $(".btn-remove-venta").on("click", function(e){
        //Para evitar que se haga la accion del href
        e.preventDefault();
        //alert("eliminando");
        ///////
        //En la linea de abajo se captura el valor de href
        var ruta = $(this).attr("href");
        //El alert imprime
        //http://localhost/myshop/venta/delete/2
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //alert(resp);
                //http://localhost/MyShop/venta
                window.location.href = base_url + resp;
            }
        });
        ///////
    });
    // $(".btn-view-venta").on("click", function(){
    //     var venta = $(this).val();
    //     //alert(venta);
    //     var infoventa = venta.split("*");
    //     html = "<p><strong>Nombres: </strong>"+infoventa[1]+"</p>"
    //     html += "<p><strong>Apellidos: </strong>"+infoventa[2]+"</p>"
    //     html += "<p><strong>Telefono:  </strong>"+infoventa[3]+"</p>"
    //     html += "<p><strong>Direccion: </strong>"+infoventa[4]+"</p>"
    //     html += "<p><strong>RUC: </strong>"+infoventa[5]+"</p>"
    //     html += "<p><strong>Categoria: </strong>"+infoventa[6]+"</p>";
    //     $("#modal-default .modal-body").html(html);
    // });
    $('#tablePedidoList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    $("#tipocomprobante").on("change", function(){
        // Captural el value del select "tipocomprobante"
        option = $(this).val();
        
        // Puede ser vacio ya que el primer elemento del select es "Seleccione..."
        if(option != ""){
            infotipocomprobante = option.split("*");

            $("#idtipocomprobante").val(infotipocomprobante[0]);
            $("#igv").val(infotipocomprobante[2]);
            $("#serie").val(infotipocomprobante[3]);
            $("#numero").val(GenerarNumeroParaVenta(infotipocomprobante[1]));
        }
        else{
            $("#idtipocomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }

        Sumar();
    });
    $('#tableVentaClienteList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
        "pageLength": 5
    });
    $(document).on("click", ".btn-check-venta-cliente", function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });
    $("#producto").autocomplete({
        source: function(request, response){
            $.ajax({
                url: base_url + "Venta/getproductosautocomplete",
                type: "POST",
                dataType: "json",
                data:{
                    valor: request.term
                },
                success: function(data){
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui){
            data = ui.item.idtb_producto + "*" + ui.item.codigo + "*" + ui.item.label + "*" + ui.item.precio + "*" + ui.item.stock;
            $("#btn-agregar").val(data);
        }
    });
    $("#btn-agregar").on("click", function(){
        data = $(this).val();
        if(data != ''){
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
            html += "<td>" + infoproducto[2] + "</td>";
            html += "<td><input type='hidden' name='precios[]' value='" + infoproducto[3] + "'>" + infoproducto[3] + "</td>";
            html += "<td>" + infoproducto[4] + "</td>";
            // AQUI AQUI AQUI ESTOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
            html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='" + infoproducto[3] +"'><p>" + infoproducto[3] + "</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-venta-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            // Selecciono la tabla de ventas para agregar todo el html
            $("#tableVentaAdd tbody").append(html);

            Sumar();
            // Se limpia el valor del boton agregar
            $("#btn-agregar").val(null);
            $("#producto").val(null);
        }
        else{
            alert("Seleccione un producto");
        }
    });
    $(document).on("click", ".btn-remove-venta-producto", function(){
        // closest es solo para buscar al elemento con etiqueta tr
        $(this).closest("tr").remove();

        Sumar();
    });
    // AQUI AQUI AQUI ESTOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
    $(document).on("keyup", "#tableVentaAdd input.cantidades", function(){
        cantidad = $(this).val();
        // closest es solo para buscar al elemento con etiqueta tr
        precio = $(this).closest("tr").find("td:eq(2)").text()
        importe = cantidad * precio;
        // Se imprime importe en el input oculto y en el parrafo
        // Se selecciona tr para ubicarse en la fila correspondiente a ese elemento
        // Se busca al elemento con indice 5(importe) contando desde 0
        // Luego como la columna tiene 2 elemento, se selecciona el elemento p que es hijo de la columna
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe);
        // Se imprime importe en el input oculto y en el parrafo
        // Se selecciona tr para ubicarse en la fila correspondiente a ese elemento
        // Se busca al elemento con indice 5(importe) contando desde 0
        // Luego como la columna tiene 2 elemento, se selecciona el elemento input que es hijo de la columna
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe);

        Sumar();
    });
    $(document).on("click", ".btn-view-venta", function(){
        //  Se captura el id de la venta por medio del value del boton
        valor_id = $(this).val();
        // Por medio de Ajax se envia el id al metodo view
        $.ajax({
            url: base_url + "Venta/view",
            type: "POST",
            dataType: "html",
            data:{
                id: valor_id
            },
            success: function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });
    $(document).on("click", ".btn-print", function(){
        $("#modal-default .modal-body").print({
            // No necesariamente va esto
            title: "Comprobante de venta"

            // Todos los elementos parametrizables
            // globalStyles: true,
        	// mediaPrint: false,
        	// stylesheet: null,
        	// noPrintSelector: ".no-print",
        	// iframe: true,
        	// append: null,
        	// prepend: null,
        	// manuallyCopyFormValues: true,
        	// deferred: $.Deferred(),
        	// timeout: 750,
        	// title: null,
        	// doctype: '<!doctype html>'
        });
    });


    $('#tableReportePedidoList').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'

            {
                // Los botones que se va a estrar mostrando (Excel)
                extend: 'excelHtml5',
                title: 'Listado de Pedidos',
                exportOptions:{
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Pedidos',
                exportOptions:{
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


    // $(".btn-remove-usuario").on("click", function(e){
    //     //Para evitar que se haga la accion del href
    //     e.preventDefault();
    //     //alert("eliminando");
    //     ///////
    //     //En la linea de abajo se captura el valor de href
    //     var ruta = $(this).attr("href");
    //     //El alert imprime
    //     //http://localhost/myshop/usuario/delete/2
    //     //alert(ruta);
    //     $.ajax({
    //         url: ruta,
    //         type:"POST",
    //         success:function(resp){
    //             //alert(resp);
    //             //http://localhost/MyShop/usuario
    //             window.location.href = base_url + resp;
    //         }
    //     });
    //     ///////
    // });
    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "Usuario/view/",
            type:"POST",
            data:{
                idusuario: id
            },
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }
        });
    });
    $('#tableUsuarioList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


    $(".btn-remove-permiso").on("click", function(e){
        //Para evitar que se haga la accion del href
        e.preventDefault();
        //alert("eliminando");
        ///////
        //En la linea de abajo se captura el valor de href
        var ruta = $(this).attr("href");
        //El alert imprime
        //http://localhost/myshop/permiso/delete/2
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //alert(resp);
                //http://localhost/MyShop/permiso
                window.location.href = base_url + resp;
            }
        });
        ///////
    });
    $(".btn-view-permiso").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "Permiso/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }
        });
    });
    $('#tablePermisoList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


    // Dashboard
    datagrafico(base_url, yearactual);
    $("#year").on("change", function(){
        yearselected = $(this).val();
        datagrafico(base_url, yearselected);
    });


    $('.sidebar-menu').tree();
})

// Esta bien que este fuera del document
function GenerarNumeroParaVenta(numero){
    if(numero >= 99999 && numero < 999999){
        return Number(numero) + 1;
    }
    if(numero >= 9999 && numero < 99999){
        return "0" + (Number(numero) + 1);
    }
    if(numero >= 999 && numero < 9999){
        return "00" + (Number(numero) + 1);
    }
    if(numero >= 99 && numero < 999){
        return "000" + (Number(numero) + 1);
    }
    if(numero >= 9 && numero < 99){
        return "0000" + (Number(numero) + 1);
    }
    if(numero < 9){
        return "00000" + (Number(numero) + 1);
    }
}
function Sumar(){
    subtotal = 0;
    // Metodo que permite recorrer los tr
    $("#tableVentaAdd tbody tr").each(function(){
        // Aqui es donde se suma el contenido de la columna import
        // Para capturar el valor de la columna import se programa $(this).find("");
        // td con indice 5(importe)
        subtotal = subtotal + Number($(this).find("td:eq(5)").text());
    });
    // Se imprime en la propiedad value el subtotal
    // Indica numero de decimales
    //$("input[name=subtotal]").val(subtotal.toFixed(2));
    $("input[name=subtotal]").val(subtotal);
    porcentaje = $("#igv").val();
    igv = subtotal * (porcentaje/100);
    // Indica numero de decimales
    //$("input[name=igv]").val(igv.toFixed(2));
    $("input[name=igv]").val(igv);
    descuento = $("input[name=descuento]").val();
    total = subtotal + igv - descuento;
    // Indica numero de decimales
    //$("input[name=total]").val(total.toFixed(2));
    $("input[name=total]").val(total);
}
function Graficando(meses, montos, yearanho){
    Highcharts.chart('graficoesestegrafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monto acumulado de pedidos'
    },
    subtitle: {
        text: 'Año ' + yearanho
    },
    xAxis: {
        categories: 
        // [
        //     'Jan',
        //     'Feb',
        //     'Mar',
        //     'Apr',
        //     'May',
        //     'Jun',
        //     'Jul',
        //     'Aug',
        //     'Sep',
        //     'Oct',
        //     'Nov',
        //     'Dec'
        // ],
            meses,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Monto acumulado (S/.)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
            '<td style="padding:0"><b>{point.y:.2f} Soles</b></td></tr>',     //59.17
            // '<td style="padding:0"><b>{point.y:.1f} Soles</b></td></tr>',    59.2
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series: {
            dataLabels: {
                enabled: true,
                formatter: function(){
                    return Highcharts.numberFormat(this.y, 2)
                }
            }
        }
    },
    series: [
        {
            name: 'Meses',
            data: montos
        }
        // {
        //     name: 'Tokyo',
        //     data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        // },
        // {
        //     name: 'New York',
        //     data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
        // },
        // {
        //     name: 'London',
        //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
        // },
        // {
        //     name: 'Berlin',
        //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
        // }
    ]
});
}
// Se escribe la base_url porque se va a estar ejecutando una peticion AJAX
function datagrafico(base_url, yearanho){
    namesMonth = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
    $.ajax({
        url: base_url + "index.php/Dashboard/getData",
        type: "POST",
        data:{
            year: yearanho
        },
        dataType: "json",
        success: 
            function(data){
                var meses = new Array();
                var montos = new Array();
                $.each(data, function(key, value){
                    meses.push(namesMonth[value.mes - 1]);
                    valor = Number(value.monto);
                    montos.push(valor);
                });
                Graficando(meses, montos, yearanho);
            }
    });
}


</script>
</body>
</html>

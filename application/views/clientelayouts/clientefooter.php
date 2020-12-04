        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2020 <a href="https://www.facebook.com/La-Bodeguita-De-Oro-107278281233183" target="_blank">Bodeguita de Oro</a></strong>
            </div>
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
    var base_url= "<?php echo base_url();?>";

    $(document).on("keyup", ".quantities", function(){
        alert("disminuyendo");
    });
    $(".btn-danger-minus").on("click", function(e){
        // Para evitar que se haga la accion del href
        e.preventDefault();
        // Este si funciona bien siempre
        var datacarrito = $(this).val();
        var cantidades = datacarrito.split("*");
        var idproducto = cantidades[0];
        var cantidadencarrito = cantidades[1];
        var stock = cantidades[2];
        // Por alguna razon no funciona bien, muestra de valor undefined de rato en rato
        var eee = e.target.dataset.id;
        // alert("aumentando" + " " + eee + " " + iddd);
        // /////
        // alert("aumentando" + " " + cantidadencarrito + " " + stock);
        if(cantidadencarrito != 1){
            //alert("iasdf");

            var ruta = base_url + "index.php/Carrito/disminuir/" + idproducto;
            $.ajax({
                url: ruta,
                type:"POST",
                success:function(resp){
                    //alert(resp);
                    //http://localhost/MyShop/categoria
                    window.location.href = base_url + resp;
                }
            });
        }
        // /////
    });
    $(".btn-info-plus").on("click", function(e){
        // Para evitar que se haga la accion del href
        e.preventDefault();
        // Este si funciona bien siempre
        var datacarrito = $(this).val();
        var cantidades = datacarrito.split("*");
        var idproducto = cantidades[0];
        var cantidadencarrito = cantidades[1];
        var stock = cantidades[2];
        // Por alguna razon no funciona bien, muestra de valor undefined de rato en rato
        var eee = e.target.dataset.id;
        // alert("aumentando" + " " + eee + " " + iddd);
        // /////
        // alert("aumentando" + " " + cantidadencarrito + " " + stock);
        if(cantidadencarrito != stock){
            //alert("iasdf");

            var ruta = base_url + "index.php/Carrito/aumentar/" + idproducto;
            $.ajax({
                url: ruta,
                type:"POST",
                success:function(resp){
                    //alert(resp);
                    //http://localhost/MyShop/categoria
                    window.location.href = base_url + resp;
                }
            });
        }
        // /////
    });
    $(".btn-remove-carrito-producto").on("click", function(e){
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

    $('#tableClientePedidoList').DataTable({
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
    $(document).on("click", ".btn-view-cliente-pedido", function(){
        // Se captura el id del pedido por medio del value del boton
        valor_id = $(this).val();
        // Por medio de Ajax se envia el id al metodo view
        $.ajax({
            url: base_url + "index.php/Compra/view",
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
            title: "Comprobante"

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

    $('.sidebar-menu').tree();
})
</script>
</body>
</html>
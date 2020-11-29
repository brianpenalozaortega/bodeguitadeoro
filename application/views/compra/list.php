
<?php
// date_default_timezone_set("America/Lima");
// echo date("Y-m-d h:i G");
// echo " a ";
// echo date("Y").date("m").date("d").date("H").date("i").date("s").$this->session->userdata("id");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mis pedidos
            <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableClientePedidoList" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Numero</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th style="text-align:center">Metodo de pago</th>
                                    <th>Ver detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($clientepedidos)): ?>
                                    <?php $contador = 1; ?>
                                    <?php foreach($clientepedidos as $pedido): ?>
                                        <tr>
                                            <td><?php echo $contador ?></td>
                                            <td><?php echo $pedido->num_pedido; ?></td>
                                            <td><?php echo $pedido->fecha; ?></td>
                                            <td><?php echo number_format($pedido->monto, 2); ?></td>
                                            <td>
                                                <span class="label label-<?php echo $pedido->idtb_estado == 1 ? "info" : ($pedido->idtb_estado == 2 ? "success" : ($pedido->idtb_estado == 3 ? "warning" : "danger")); ?>">
                                                    <?php echo $pedido->estado; ?>
                                                </span>
                                                <!-- 
                                                info
                                                success
                                                warning
                                                danger 
                                                -->
                                            </td>
                                            <td style="text-align:center">
                                                <span class="label bg-<?php echo $pedido->idtb_tipo_pago == 1 ? "green" : "purple"; ?>">
                                                    <?php echo $pedido->tipopago; ?>
                                                </span>
                                                <!-- 
                                                green
                                                purple
                                                -->
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-cliente-pedido" data-toggle="modal" data-target="#modal-default" value="<?php echo $pedido->idtb_pedido; ?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $contador = 1 + $contador; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Informacion del pedido</h4>
            </div>
            <div class="modal-body">
        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> Imprimir</span></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pedidos
            <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>index.php/Categoria/add" class="btn btn-primary btn-flat">
                            <span class="fa fa-plus"></span>
                            Agregar categoria
                        </a>
                    </div>
                </div> -->
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tablePedidoList" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Numero</th>
                                    <th>Fecha y hora</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($pedidos)): ?>
                                    <?php $contador = 1; ?>
                                    <?php foreach($pedidos as $pedido): ?>
                                        <tr>
                                            <td><?php echo $contador; ?></td>
                                            <td><?php echo $pedido->num_pedido; ?></td>
                                            <td><?php echo $pedido->fecha; ?></td>
                                            <td><?php echo $pedido->nombre." ".$pedido->apellido; ?></td>
                                            <!-- <td><?php echo $pedido->estado; ?></td> -->
                                            <td><?php echo $pedido->monto; ?></td>
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
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-pedido" data-toggle="modal" data-target="#modal-default" value="<?php echo $pedido->idtb_pedido; ?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url() ?>index.php/Pedido/edit/<?php echo $pedido->idtb_pedido; ?>" class="btn btn-warning">
                                                        <span class="fa fa-truck"></span>
                                                    </a>
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
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del Pedido</h4>
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reportes
            <small>Pedido</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url(); ?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Desde:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio : ''; ?>">
                            </div>
                            <label for="" class="col-md-1 control-label">Hasta:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin : ''; ?>">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>index.php/Reporte" class="btn btn-danger">Restablecer</a>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableReportePedidoList" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Tipo de Comprobante</th>
                                    <th>Numero del Comprobante</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($pedidos)): ?>
                                    <tr>
                                        <td>0</td>
                                        <td>No hay registros</td>
                                        <td>No hay registros</td>
                                        <td>No hay registros</td>
                                        <td>No hay registros</td>
                                        <td>No hay registros</td>
                                        <td>No hay registros</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-info">
                                                    <span class="fa fa-eye"></span>
                                                </a>
                                                <a href="#" class="btn btn-warning">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                                <a href="#" class="btn btn-danger">
                                                    <span class="fa fa-remove"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if(!empty($pedidos)): ?>
                                    <?php foreach($pedidos as $pedido): ?>
                                        <tr>
                                            <td><?php echo $pedido->idtb_pedido; ?></td>
                                            <td><?php echo $pedido->estado; ?></td>
                                            <td><?php echo $pedido->idtb_pedido; ?></td>
                                            <td><?php echo $pedido->idtb_pedido; ?></td>
                                            <td><?php echo $pedido->fecha; ?></td>
                                            <td><?php echo $pedido->monto; ?></td>
                                            <?php $datapedido = $pedido->idtb_pedido."*".$pedido->idtb_pedido; ?>
                                            <td>
                                                <button type="button" class="btn btn-info btn-view-pedido" value="<?php echo $pedido->idtb_pedido;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                            </td>
                                        </tr>
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clientes
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
                        <table id="tableClienteList" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Referencia</th>
                                    <th>Celular</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($clientes)): ?>
                                    <?php $contador = 1; ?>
                                    <?php foreach($clientes as $cliente): ?>
                                        <tr>
                                            <td><?php echo $contador; ?></td>
                                            <td><?php echo $cliente->nombre." ".$cliente->apellido; ?></td>
                                            <td><?php echo $cliente->direccion; ?></td>
                                            <td><?php echo $cliente->referencia; ?></td>
                                            <td><?php echo $cliente->celular; ?></td>
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
        <h4 class="modal-title">Informacion del Cliente</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
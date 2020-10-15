
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Productos
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
                        <a href="<?php echo base_url(); ?>Producto/add" class="btn btn-primary btn-flat">
                            <span class="fa fa-plus"></span>
                            Agregar producto
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableProductoList" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Categoria</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($productos)): ?>
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
                                <?php if(!empty($productos)): ?>
                                    <?php foreach($productos as $producto): ?>
                                        <tr>
                                            <td><?php echo $producto->idtb_producto; ?></td>
                                            <td><?php echo $producto->codigo; ?></td>
                                            <td><?php echo $producto->nombre; ?></td>
                                            <td><?php echo $producto->descripcion; ?></td>
                                            <td><?php echo $producto->precio; ?></td>
                                            <td><?php echo $producto->stock; ?></td>
                                            <td><?php echo $producto->categoria; ?></td>
                                            <?php $dataproducto = $producto->idtb_producto."*".$producto->codigo."*".$producto->nombre."*".$producto->descripcion."*".$producto->precio."*".$producto->stock."*".$producto->categoria; ?>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- version categoria -->
                                                    <!-- <button type="button" class="btn btn-info btn-view-cliente" data-toggle="modal" data-target="#modal-default" value="<?php echo $cliente->idtb_cliente; ?>"> -->
                                                    <!-- version cliente -->
                                                    <button type="button" class="btn btn-info btn-view-producto" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataproducto ?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url() ?>Producto/edit/<?php echo $producto->idtb_producto; ?>" class="btn btn-warning">
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                    <a href="<?php echo base_url() ?>Producto/delete/<?php echo $producto->idtb_producto; ?>" class="btn btn-danger btn-remove-producto">
                                                        <span class="fa fa-remove"></span>
                                                    </a>
                                                </div>
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
        <h4 class="modal-title">Informacion del Producto</h4>
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
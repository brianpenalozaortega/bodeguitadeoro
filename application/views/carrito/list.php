
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Carrito de compras
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
                        <a href="<?php echo base_url(); ?>index.php/Producto/add" class="btn btn-primary btn-flat">
                            <span class="fa fa-plus"></span>
                            Agregar producto
                        </a>
                    </div>
                </div>
                <hr> -->
                <div class="row">
                    <div class="col-md-12">
                        <table id="tableProductoList" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>






                                <?php if(!empty($productos)): ?>
                                    <?php foreach($productos as $producto): ?>
                                        <tr>
                                            <td><?php echo $producto->idtb_producto; ?></td>
                                            <td><?php echo $producto->nombre; ?></td>
                                            <td><?php echo $producto->precio; ?></td>
                                            <td><?php echo $producto->stock; ?></td>
                                            <td><img src='<?php echo base_url(); ?>assets/template/imagenes/<?php echo $producto->imagen; ?>' style='height:200px;'></td>
                                            <td><?php echo $producto->categoria; ?></td>
                                            <?php $dataproducto = $producto->idtb_producto."*".$producto->nombre."*".$producto->precio."*".$producto->stock."*".$producto->imagen."*".$producto->categoria."*".base_url(); ?>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- version categoria -->
                                                    <!-- <button type="button" class="btn btn-info btn-view-cliente" data-toggle="modal" data-target="#modal-default" value="<?php echo $cliente->idtb_cliente; ?>"> -->
                                                    <!-- version cliente -->
                                                    <button type="button" class="btn btn-info btn-view-producto" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataproducto ?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url() ?>index.php/Producto/edit/<?php echo $producto->idtb_producto; ?>" class="btn btn-warning">
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>





                                        <!-- <tr>
                                            <td>1</td>
                                            <td>Libro PHP</td>
                                            <td>Imagen</td>
                                            <td>Categoria</td>
                                            <td>$10</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-danger">
                                                        <span class="fa fa-times"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Libro Java</td>
                                            <td>Imagen</td>
                                            <td>Categoria</td>
                                            <td>$20</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-danger">
                                                        <span class="fa fa-times"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right"><h3>Total</h3></td>
                                            <td align="left"><h3>$<?php echo number_format(30,2) ?></h3></td>
                                        </tr> -->











                                <?php $total = 0; ?>
                                <?php $contador = 1; ?>
                                <?php if(!empty($_SESSION['CARRITO'])): ?>
                                    <?php foreach($_SESSION['CARRITO'] as $indice=>$producto): ?>
                                        <tr>
                                            <td><?php echo $contador ?></td>
                                            <td><?php echo $producto['nombre'] ?></td>
                                            <td align="center"><img src='<?php echo base_url(); ?>assets/template/imagenes/<?php echo $producto['imagen']; ?>' style='height:150px;width:150px;'></td>
                                            <td><?php echo $producto['categoria'] ?></td>
                                            <td>S/.<?php echo number_format($producto['precio'],2) ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- // $producto['idtb_producto']; -->
                                                    <a href="<?php echo base_url() ?>index.php/Carrito/delete/<?php echo $producto['idtb_producto']; ?>" class="btn btn-danger btn-remove-carrito-producto">
                                                        <span class="fa fa-remove"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $total = $total + number_format($producto['precio'],2); ?>
                                        <?php $contador = 1 + $contador; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="4" align="right"><h3>Total</h3></td>
                                    <td align="left"><h3>S/.<?php echo number_format($total,2) ?></h3></td>
                                </tr>




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
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Carrito de compras
            <small>Listado</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php // print_r($_SESSION['CARRITO']); ?>
                        <!-- <br><br> -->
                        <?php // print_r($_SESSION['CARRITO'][11]); ?>
                        <!-- <br><br> -->
                        <?php // print_r($_SESSION['CARRITO'][11]['categoria']); ?>
                        <?php if(!empty($_SESSION['CARRITO'])): ?>
                            <table id="tableProductoList" class="table table-bordered btn-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Stock Max.</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php $subtotal = 0; ?>
                                    <?php $contador = 1; ?>
                                    <?php $stockbyproducto = 0; ?>
                                        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto): ?>
                                            <tr>
                                                <td><?php echo $contador ?></td>
                                                <td><?php echo $producto['nombre'] ?></td>
                                                <td align="center"><img src='<?php echo base_url(); ?>assets/template/imagenes/<?php echo $producto['imagen']; ?>' style='height:150px;width:150px;'></td>
                                                <td><?php echo $producto['categoria'] ?></td>
                                                <td>S/.<?php echo number_format($producto['precio'],2) ?></td>
                                                <td>
                                                    <?php foreach($productos as $product): ?>
                                                        <?php if($product->idtb_producto == $producto['idtb_producto']): ?>
                                                            <?php $stockbyproducto = $product->stock; ?>
                                                            <?php echo $product->stock ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <?php $datacarrito = $producto['idtb_producto']."*".$producto['cantidad']."*".$stockbyproducto; ?>
                                                <td>
                                                    <button class="btn btn-danger btn-danger-minus btn-sm" data-id="<?php echo $producto['idtb_producto'] ?>" value="<?php echo $datacarrito ?>">
                                                        <span class="fa fa-minus"></span>
                                                    </button>
                                                    <input type="number" name="cantidad" value="<?php echo $producto['cantidad'] ?>" min="1" max="<?php echo $stockbyproducto ?>" disabled>    
                                                    <button class="btn btn-info btn-info-plus btn-sm" data-id="<?php echo $producto['idtb_producto'] ?>" value="<?php echo $datacarrito ?>">
                                                        <span class="fa fa-plus"></span>
                                                    </button>
                                                </td>
                                                <?php $subtotal = $producto['precio'] * $producto['cantidad']; ?>
                                                <td>S/.<?php echo number_format($subtotal, 2) ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() ?>index.php/Carrito/delete/<?php echo $producto['idtb_producto']; ?>" class="btn btn-danger btn-remove-carrito-producto">
                                                            <span class="fa fa-remove"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $total = $total + $subtotal; ?>
                                            <?php $contador = 1 + $contador; ?>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="7" align="right"><h3>Total</h3></td>
                                            <td align="left"><h3>S/.<?php echo number_format($total, 2) ?></h3></td>
                                        </tr>
                                </tbody>
                            </table>
                            
                            <br>
                            <!-- <div style="text-align: center;"> -->
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <!-- <a href="#" class="btn btn-primary" style="width:200px;height:60px;display: flex; justify-content: center; align-items: center;">
                                    <span class="fa fa-plus"></span>
                                    Comprar
                                </a> -->
                                <form action="<?php echo base_url() ?>index.php/Pago" method="POST">
                                    <input type="hidden" value="<?php echo number_format($total, 2) ?>" name="total">
                                    <!-- <a href="<?php // echo base_url(); ?>index.php/Carrito/store" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Comprar</a> -->
                                    <button type="submit" class="btn btn-success btn-flat">Elegir metodo de pago</button>
                                </form>
                            </div>

                        <?php else: ?>
                            <div class="alert alert-success">
                                No hay productos en el carrito
                            </div>
                        <?php endif; ?>

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

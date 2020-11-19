
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pedidos
            <small>Delivery</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url() ?>index.php/Pedido/update" method="POST">
                            <input type="hidden" value="<?php echo $pedido->idtb_pedido; ?>" name="idpedido">
                            <div class="form-group">
                                <label for="num_pedido">Numero</label>
                                <input type="text" class="form-control" id="num_pedido" name="num_pedido" value="<?php echo $pedido->num_pedido ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha y hora</label>
                                <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $pedido->fecha ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="persona">Cliente</label>
                                <input type="text" class="form-control" id="persona" name="persona" value="<?php echo $pedido->nombre." ".$pedido->apellido ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="monto">Total</label>
                                <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $pedido->monto ?>" disabled>
                            </div>
                            <!-- <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $pedido->estado ?>">
                            </div> -->
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <?php foreach($estados as $estado): ?>
                                        <?php if($estado->idtb_estado == $pedido->idtb_estado): ?>
                                            <option value="<?php echo $estado->idtb_estado ?>" selected>
                                                <?php echo $estado->nombre ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?php echo $estado->idtb_estado ?>">
                                                <?php echo $estado->nombre ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
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

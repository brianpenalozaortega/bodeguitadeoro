
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Productos
            <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>
                                    <i class="icon fa fa-ban"></i>
                                    <?php echo $this->session->flashdata("error"); ?>
                                </p>
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url() ?>index.php/Producto/update" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $producto->idtb_producto; ?>" name="id">
                            <!-- El condicional es para que se muestre en rojo cuando se ha producido un error al agregar una nueva categoria -->
                            <!-- En el condicional se valida que la variable error este vacio, esa variable viene del Controlador -->
                            <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : '' ?>">
                                <label for="nombre">Nombre:</label>
                                <!-- Para recuperar la informacion que se ha enviado se agrega la propiedad "value" a la etiqueta "input y se imprime el metodo set_value()" -->
                                <!-- El metodo "set_value()" recibe como parametro el nombre del campo que se esta validando -->
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $producto->nombre ?>">
                                <!-- Imprimir el metodo form_error() recibe 3 parametros -->
                                <!-- 1) Nombre del campo del cual estamos haciendo la validacion -->
                                <!-- 2) La etiqueta donde se va a imprimir dicho mensaje "<span>" (Se puede estilizar) -->
                                <!-- 3) Se indica el cierre de la etiqueta "</span>" -->
                                <?php echo form_error("nombre", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <!-- El condicional es para que se muestre en rojo cuando se ha producido un error al agregar una nueva categoria -->
                            <!-- En el condicional se valida que la variable error este vacio, esa variable viene del Controlador -->
                            <div class="form-group <?php echo !empty(form_error("precio")) ? 'has-error' : '' ?>">
                                <label for="precio">Precio:</label>
                                <!-- Para recuperar la informacion que se ha enviado se agrega la propiedad "value" a la etiqueta "input y se imprime el metodo set_value()" -->
                                <!-- El metodo "set_value()" recibe como parametro el nombre del campo que se esta validando -->
                                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo !empty(form_error("precio")) ? set_value("precio") : $producto->precio ?>">
                                <!-- Imprimir el metodo form_error() recibe 3 parametros -->
                                <!-- 1) Nombre del campo del cual estamos haciendo la validacion -->
                                <!-- 2) La etiqueta donde se va a imprimir dicho mensaje "<span>" (Se puede estilizar) -->
                                <!-- 3) Se indica el cierre de la etiqueta "</span>" -->
                                <?php echo form_error("precio", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <!-- El condicional es para que se muestre en rojo cuando se ha producido un error al agregar una nueva categoria -->
                            <!-- En el condicional se valida que la variable error este vacio, esa variable viene del Controlador -->
                            <div class="form-group <?php echo !empty(form_error("stock")) ? 'has-error' : '' ?>">
                                <label for="stock">Stock:</label>
                                <!-- Para recuperar la informacion que se ha enviado se agrega la propiedad "value" a la etiqueta "input y se imprime el metodo set_value()" -->
                                <!-- El metodo "set_value()" recibe como parametro el nombre del campo que se esta validando -->
                                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo !empty(form_error("stock")) ? set_value("stock") : $producto->stock ?>">
                                <!-- Imprimir el metodo form_error() recibe 3 parametros -->
                                <!-- 1) Nombre del campo del cual estamos haciendo la validacion -->
                                <!-- 2) La etiqueta donde se va a imprimir dicho mensaje "<span>" (Se puede estilizar) -->
                                <!-- 3) Se indica el cierre de la etiqueta "</span>" -->
                                <?php echo form_error("stock", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-image"></i> Imagen
                                    <input type="file" name="imagen" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                                <p class="help-block">Max. 1MB</p>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria): ?>
                                        <?php if($categoria->idtb_categoria == $producto->idtb_categoria): ?>
                                            <option value="<?php echo $categoria->idtb_categoria ?>" selected>
                                                <?php echo $categoria->nombre ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?php echo $categoria->idtb_categoria ?>">
                                                <?php echo $categoria->nombre ?>
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

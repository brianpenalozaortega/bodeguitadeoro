
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">


            <div class="box-header with-border">
              <h3 class="box-title">Productos</h3>
              <br><br>
              <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria" class="form-control">
                    <?php foreach($categorias as $categoria): ?>
                        <option value="<?php echo $categoria->idtb_categoria ?>"><?php echo $categoria->nombre ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->




            <div class="box-body no-padding">
              <!-- <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="https://images.springer.com/sgw/books/medium/9781484217290.jpg" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size">
                          1.9 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>

                  <div class="card-body">
                    <span>Titulo del producto</span>
                    <h5 class="card-title">$300.00</h5>
                    <p class="card-text">Descripcion</p>
                    <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                  </div>
                </li>
              </ul> -->


              <!-- <div class="col-lg-3 col-xs-6">
                <div class="card card-sm card-product-grid">
                  <img src="https://images.springer.com/sgw/books/medium/9781484217290.jpg" alt="Titulo" class="card-img-top" title="Titulo producto">
                  <div class="card-body">
                    <span>Nombre</span>
                    <h5 class="card-title">$300</h5>
                    <p class="card-text">Descripcion</p>
                    <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    <p class="card-text"></p>
                  </div>
                </div>
              </div> -->

              <?php if(!empty($productos)): ?>
                <?php foreach($productos as $producto): ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="card card-sm card-product-grid">
                      <img src="<?php echo base_url(); ?>assets/template/imagenes/<?php echo $producto->imagen; ?>" style="height:150px;width:150px;" alt="Titulo" class="card-img-top" title="Titulo producto">
                      <div class="card-body">
                        <span><?php echo $producto->nombre; ?></span>
                        <h5 class="card-title">S/.<?php echo $producto->precio; ?></h5>
                        <p class="card-text"><?php echo $producto->categoria; ?></p>
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                        <p class="card-text"></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>


            </div>










            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->






          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
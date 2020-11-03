
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <section class="content-header">
                <h1>
                    Categoria
                    <small>Editar</small>
                </h1>
            </section> -->
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                    <!-- Esta vista es la del dashboard -->

                    <!-- /.box -->
                        <h2 class="page-header">Seleccionar metodo de pago</h2>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Widget: user widget style 1 -->
                                <!-- <div class="box box-widget widget-user-2"> -->
                                    <div class="box box-widget widget-user">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-green" style="display: flex; justify-content: center; align-items: center;">
                                            <!-- <div class="widget-user-image">
                                                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
                                            </div> -->
                                            <!-- /.widget-user-image -->
                                            <h3 class="widget-user-username">Pago contra entrega</h3>
                                            <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
                                        </div>
                                        <div class="box-footer no-padding" style="display: flex; justify-content: center; align-items: center;">
                                            <img src="<?php echo base_url()?>assets/template/pictures/pagocontraentrega.png" alt="Pago contra entrega" width="310" height="310">
                                        </div>
                                        <br>
                                        <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                            <input type="radio" id="contraentrega" name="pago" value="contraentrega">
                                            <label for="contraentrega">Contra Entrega</label>
                                        </div>
                                        <br>
                                        <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                            <h4>Debera pagar el monto al recibir el producto en efectivo</h4>
                                        </div>
                                    </div>
                                <!-- /.widget-user -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-purple" style="display: flex; justify-content: center; align-items: center;">
                                        <h3 class="widget-user-username">Pago con Yape</h3>
                                        <!-- <h5 class="widget-user-desc">Founder &amp; CEO</h5> -->
                                    </div>
                                    <!-- <div class="widget-user-image">
                                        <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                                    </div> -->
                                    <div class="box-footer no-padding" style="display: flex; justify-content: center; align-items: center;">
                                        <img src="<?php echo base_url()?>assets/template/pictures/noqr.png" alt="Yape" width="600" height="310">
                                    </div>
                                    <br>
                                    <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                        <input type="radio" id="yape" name="pago" value="yape">
                                        <label for="yape">Yape</label>
                                    </div>
                                    <br>
                                    <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                        <h4>Escanear el codigo QR o guardar el numero para realizar el pago mediante la aplicacion</h4>
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <br>

                        <div style="display: flex; justify-content: center; align-items: center;">
                            <!-- <a href="#" class="btn btn-primary" style="width:200px;height:60px;display: flex; justify-content: center; align-items: center;">
                                <span class="fa fa-plus"></span>
                                Comprar
                            </a> -->
                            <form action="<?php echo base_url() ?>index.php/Pago/store" method="POST">
                                <!-- <a href="<?php // echo base_url(); ?>index.php/Carrito/store" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Comprar</a> -->
                                <button type="submit" class="btn btn-warning btn-flat">Comprar</button>
                            </form>
                        </div>


                    </div>
                    <!-- /.box-body -->
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

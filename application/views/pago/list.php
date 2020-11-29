<div class="content-wrapper">
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <form action="<?php echo base_url() ?>index.php/Pago/store" method="POST">

                    <h2 class="page-header">Seleccionar metodo de pago</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-widget widget-user">
                                <div class="widget-user-header bg-green" style="display: flex; justify-content: center; align-items: center;">
                                    <h3 class="widget-user-username">Pago contra entrega</h3>
                                </div>
                                <div class="box-footer no-padding" style="display: flex; justify-content: center; align-items: center;">
                                    <img src="<?php echo base_url()?>assets/template/pictures/pagocontraentrega.png" alt="Pago contra entrega" width="310" height="310">
                                </div>
                                <br>
                                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pago" value="1" checked>
                                                <b>Contra entrega</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                
                                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-widget widget-user">
                                <div class="widget-user-header bg-purple" style="display: flex; justify-content: center; align-items: center; ">
                                    <h3 class="widget-user-username">Pago con Yape</h3>
                                </div>
                                <div class="box-footer no-padding" style="display: flex; justify-content: center; align-items: center;">
                                    <img src="<?php echo base_url()?>assets/template/pictures/yape.png" alt="Yape" width="310" height="310">
                                </div>

                                <br>

                                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pago" value="2">
                                                <b>Yape</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div style="display: flex; justify-content: center; align-items: center;">
                        <button type="submit" class="btn btn-warning btn-flat">Comprar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
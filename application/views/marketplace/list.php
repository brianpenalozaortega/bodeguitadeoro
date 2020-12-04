<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Productos</h3>
            <br><br>
          </div>
          <div class="box-body no-padding">
            <?php if(!empty($productos)): ?>
              <?php foreach($productos as $producto): ?>
                <div class="col-lg-3 col-xs-6">
                  <div class="card card-sm card-product-grid">
                    <img src="<?php echo base_url(); ?>assets/template/imagenes/<?php echo $producto->imagen; ?>" style="height:150px;width:150px;" alt="Titulo" class="card-img-top" title="Titulo producto">
                    <div class="card-body">
                      <span><?php echo $producto->nombre; ?></span>
                      <h5 class="card-title">S/.<?php echo $producto->precio; ?></h5>
                      <p class="card-text"><?php echo $producto->categoria; ?></p>
                      <a href="<?php echo base_url(); ?>index.php/Marketplace/agregarproducto/<?php echo $producto->idtb_producto; ?>" class="btn btn-warning btn-flat" style="border-radius: 6px;">
                        <i class="fa fa-cart-plus"> </i>
                        <b> Agregar al carrito</b>
                      </a>
                      <p class="card-text"></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
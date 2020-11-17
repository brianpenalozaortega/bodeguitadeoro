<div class="row">
	<div class="col-xs-12 text-center">
        <h2>Bodeguita de Oro</h2>
        Villa Maria del Triunfo
        <br>
        Tel. 999 - 999 - 999
        <!-- <br>
		email : bodeguitadeoro@gmail.com -->
	</div>
</div> 
<br>
<div class="row">
	<div class="col-xs-6">	
        <b>Cliente</b>
        <br>
        <b>Nombre:</b> <?php echo $pedido->nombre." ".$pedido->apellido; ?> 
        <br>
        <br>
	</div>	
	<div class="col-xs-6">	
         <b>Pedido</b> 
        <br>
        <!--
        <b>Tipo de Comprobante:</b> <?php echo $pedido->tipocomprobante; ?>
        <br>
        <b>Serie:</b> <?php echo $pedido->serie; ?>
        <br> -->
        <b>Numero de pedido: </b><?php echo $pedido->num_pedido; ?>
        <br>
        <b>Fecha y Hora: </b><?php echo $pedido->fecha; ?>
        <!-- <br>
		<b>Hora: </b><?php echo $pedido->fecha; ?> -->
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
                    <th>N°</th>
                    <th>Producto</th>
					<th>Categoria</th>
                    <th>Imagen</th>
					<th>Precio</th>
					<th>Cantidad</th>
                    <th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
                <?php $contador = 1; ?>
				<?php $total = 0; ?>
				<?php foreach($detalles as $detalle):?>
                    <tr>
                        <td><?php echo $contador ?></td>
                        <td><?php echo $detalle->nombre; ?></td>
                        <td><?php echo $detalle->categoria; ?></td>
						<td align="center"><img src='<?php echo base_url(); ?>assets/template/imagenes/<?php echo $detalle->imagen; ?>' style='height:100px;width:100px;'></td>
                        <td><?php echo $detalle->precio; ?></td>
                        <td><?php echo 1; ?></td>
                        <td><?php echo $detalle->precio; ?></td>
                    </tr>
                    <?php $contador = 1 + $contador; ?>
					<?php $total = $total + number_format($detalle->precio, 2); ?>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<!-- <tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo 1; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>IGV:</strong></td>
					<td><?php echo 1; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo 1; ?></td>
				</tr> -->
				<tr>
					<td colspan="6" class="text-right"><strong>Total:</strong></td>
					<td><?php echo number_format($total, 2) ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
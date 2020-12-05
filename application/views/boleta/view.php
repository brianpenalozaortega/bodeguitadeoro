<div class="row">
	<div class="col-xs-12 text-center">
        <h2>Boleta</h2>
	</div>
</div> 
<br>
<div class="row">
	<!-- <div class="col-xs-6">	
        <b>Cliente</b>
        <br>
	</div> -->
	<div class="col-xs-6">	
        <b>Fecha: </b><?php echo $boleta->fecha; ?>
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
                        <td>S/.<?php echo number_format($detalle->precio, 2); ?></td>
                        <td><?php echo $detalle->cantidad; ?></td>
                    </tr>
                    <?php $contador = 1 + $contador; ?>
					<?php $total = $total + number_format($detalle->precio * $detalle->cantidad, 2); ?>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
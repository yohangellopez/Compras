

<?php require_once '../../includes/cabecera.php'; ?>
<?php require_once '../../includes/yohangel.php'; ?>
<?php require_once '../../includes/comprobar_login.php';?>

		

		
<!-- CAJA PRINCIPAL -->
<div class="container">
    
		<h1>Articulos</h1>
		
		
		<form action="busqueda_pr.php" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<input type="text" name="parametro" placeholder="Busque alguna articulo" class="form-control">
				</div>
				<div class="col-sm-2">
					<input type="submit" class="btn btn-primary" value="Buscar">
				</div>
				<div class="col-sm-2">
					<a href="registro_articulo.php" class="btn btn-success">Nuevo</a>
				</div>
				<div class="col-sm-2">
					<a href="excel_pr.php" class="btn btn-success">Descargar</a>
				</div>
			</div>
		</form>
		
		<table class="table">
		   <thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Unidad de medida</th>
                <th>Precio ($)</th>
                
                <th>&nbsp</th>
                <th>&nbsp</th>
		    </thead>		
			
			<tbody>
				<!-- <?php  
					//$entradas = mostrarPropuestas($db);
					//$filas = pg_NumRows($entradas);

					//if(!empty($entradas)):
						//for ($j=0; $j < $filas; $j++):
							?>
							<tr>
							<td>  </td>	
							<td>  </td>
							<td>  </td>
							<td>  </td>	
                            <td>  </td>
                           

                            <td><a href="eliminar_pr.php?id="><input class="btn btn-danger"type="button" value="Borrar"></a></td>
                            <td><a href="detalles_pr.php?id="><input class="btn btn-success" type="button" value="Detalles"></a></td>					

							</tr>
							 -->
				<?php
						//endfor;
					//endif;
					
					//?>
							<td> 1 </td>	
							<td> Pizarra </td>
							<td> 100x50 </td>
							<td> cm </td>	
                            <td> 300 </td>
                           

                            <td><a href="eliminar_pr.php?id="><input class="btn btn-danger"type="button" value="Borrar"></a></td>
                            <td><a href="detalles_pr.php?id="><input class="btn btn-success" type="button" value="Detalles"></a></td>	
			</tbody>
		</table>
	</div>
</div> <!--fin principal-->
<?php require_once '../../includes/pie.php'; ?>
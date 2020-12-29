<?php require_once '../../includes/comprobar_login.php';?>
<?php require_once '../../includes/cabecera.php'; ?>
<?php require_once '../../includes/yohangel.php'; ?>


		
<!-- CAJA PRINCIPAL -->
<div class="container">
    
	<div class="container">
		<h1>Dependencias</h1>
		<form action="busqueda_e.php" class="" method="POST">
			<div class="row">
		
				<div class="col-sm-6">
					<input type="text" name="parametro" placeholder="Busque alguna dependencia" class="form-control">
				</div>
				<div class="col-sm-2">
					<input type="submit" class="btn btn-primary" value="Buscar">
				</div>
				<div class="col-sm-2">
					<a href="registro_dependencia.php" class="btn btn-success">Nuevo</a>
				</div>

				<div class="col-sm-2">
					<a href="excel_p.php" class="btn btn-success">Descargar</a>
				</div>
			</div>
		</form>
		<table class="table">
		   <thead>
				<th>Codigo dependencia</th>
				<th>Codigo empleado</th>
                <th>Numero de solicitud</th>
				<th>Nombre</th>
				<th>C.C.A</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
		    </thead>		
			
			<tbody>
				<!-- <?php 
					//$entradas = mostrarProfesores($db);
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

								<td><a href="eliminar_p.php?id="><input class="btn btn-danger"type="button" value="Borrar"></a></td>
								<td><a href="Actualizar_p.php?id="><input class="btn btn-success" type="button" value="Actualizar"></a></td>					

                            </tr>
				<?php
						//endfor;
					//endif;
					
					?> -->
					<tr>
								<td> 1 </td>	
								<td> 1 </td>
								<td> 1 </td>
								<td> Prueba </td>
								<td> Centro </td>

								<td><a href="eliminar_p.php?id="><input class="btn btn-danger"type="button" value="Borrar"></a></td>
								<td><a href="Actualizar_p.php?id="><input class="btn btn-success" type="button" value="Actualizar"></a></td>					

                            </tr>
			</tbody>
		</table>
	</div>
</div> <!--fin principal-->
<?php require_once '../../includes/pie.php'; ?>
<?php require_once '../../includes/cabecera.php'; ?>
<?php require_once '../../includes/comprobar_login.php';?>
				
<!-- CAJA PRINCIPAL -->
<div class="container">
    
	<div class="container">
		<h1>EMPLEADOS</h1>
		<form action="busqueda_t.php" method="POST">
			<div class="row">
		
				<div class="col-sm-6">
					<input type="text" name="parametro" placeholder="Busque algún empleado" class="form-control">
				</div>

				<div class="col-sm-2">
					<input type="submit" class="btn btn-primary" value="Buscar">
				</div>

				<div class="col-sm-2">
					<a href="registro_empleado.php" class="btn btn-success">Nuevo</a>
				</div>

				<div class="col-sm-2">
					<a href="excel_t.php" class="btn btn-success">Descargar</a>
				</div>
		
			</div>
		</form>
		<table class="table">
		   <thead>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Direccion</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
		    </thead>		
			
			<tbody>
				<!-- <?php 
					// $entradas = mostrarTesistas($db);
					// $filas = pg_NumRows($entradas);
					
					// if(!empty($entradas)):
					// 	for ($j=0; $j < $filas; $j++):
					// 	?>
							<tr>
							<td>  </td>	
							<td>  </td>
							<td> </td>
							<td> </td>	
							<td> </td>
                            <td><a href="eliminar_t.php?cedula="><input class="btn btn-danger"type="button" value="Borrar"></a></td>
                            <td><a href="Actualizar_T.php?cedula="><input class="btn btn-success" type="button" value="Actualizar"></a></td>					
							</tr>
				<?php
					// 	endfor;
					// endif;
					
					?> -->
					<tr>
							<td> 1 </td>	
							<td> Yohangel </td>
							<td> Unare</td>
							<td> 04129451762</td>	
							<td> yohangel@gmail.com</td>
                            <td><a href="eliminar_t.php?cedula="><input class="btn btn-danger"type="button" value="Borrar"></a></td>
                            <td><a href="Actualizar_T.php?cedula="><input class="btn btn-success" type="button" value="Actualizar"></a></td>					
							</tr>
			</tbody>
		</table>
	</div>
</div> <!--fin principal-->
<?php require_once '../../includes/pie.php'; ?>
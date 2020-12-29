<?php require_once '../../includes/conexion.php';

	if (isset($_POST["rt"])){
		
		$nombre=$_POST["especialidad"];
		
		$sql="INSERT INTO especialidades(nombreEspecialidad) VALUES ('$nombre')";
		$especialidad=pg_Exec($db,$sql);

		if($especialidad==false){
			var_dump('Error en la consulta');
		}else{
			header("Location:Mostrar_e.php");
		}

	}

?>


<?php require_once '../../includes/cabecera.php'; ?>
				
<?php
	
?>
<!-- CAJA PRINCIPAL -->
<div id="">
    
	<div class="container">
		<h1>SOLICITUD DE COMPRA</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
			<div class="card-header">
				<div class="container">
						
					<div class="form-group">
						<label for="" src="nombre">Fecha de Orden</label>
						<input type="date" name="nombre" class="form-control" id="nombre">
					</div>
					<div class="form-group">
						<label for="" src="correo_u">Prioridad</label>
						<input type="email"  name="correo_ucab" class="form-control" id="correo_ucab" >
					</div>
					<div class="form-group">
						<label for="" src="telefono">Nota</label>
						<input type="number" name="telefono" class="form-control" id="telefono" >
					</div>
					<div class="form-group">
						<label for="" src="correo_p">Precio Estimado</label>
						<input type="email"  name="correo_part" class="form-control" id="correo_part" >
					</div>
	
					
					<input type="submit" class="btn btn-primary" name="rt" id="rt" value="Registrar solicitud">
				</div>
			</div>
		</form>
			
	</div>
</div> <!--fin principal-->

	
<?php require_once '../../includes/pie.php'; ?>
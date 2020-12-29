<?php require_once '../../includes/conexion.php';

	if (isset($_POST["rt"])){
		$cedula=$_POST["cedula"];
		$nombre=$_POST["nombre"];
		$correo_ucab=$_POST["correo_ucab"];
		$correo_part=$_POST["correo_part"];
		$telefono=$_POST["telefono"];
		$sexo=$_POST["sexo"];
		$sql="INSERT INTO tesistas(cedula, nombre, correo_ucab, correo_part, telefono, sexo) VALUES ('$cedula','$nombre','$correo_ucab','$correo_part','$telefono','$sexo')";

		$tesista=pg_Exec($db,$sql);

		if($tesista==false){
			var_dump('Error en la consulta');
		}else{
			header("Location:Mostrar_t.php");
		}

	}

?>


<?php require_once '../../includes/cabecera.php'; ?>
				
<?php
	
?>
<!-- CAJA PRINCIPAL -->
<div id="">
    
	<div class="container">
		<h1>REGISTRO DE EMPLEADO</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
			<div class="card-header">
				<div class="container">
					<div class="form-group">
						<label for="" src="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control" id="nombre">
					</div>
					<div class="form-group">
						<label for="" src="correo_u">Direccion</label>
						<input type="email"  name="correo_ucab" class="form-control" id="correo_ucab" >
					</div>
					<div class="form-group">
						<label for="" src="telefono">Telefono</label>
						<input type="number" name="telefono" class="form-control" id="telefono" >
					</div>
					<div class="form-group">
						<label for="" src="correo_p">Email</label>
						<input type="email"  name="correo_part" class="form-control" id="correo_part" >
					</div>
					<div class="form-group">
					<label for=""> Tipo: </label>
						<select name="tipo" class="form-control">
							<option value="interno">Jefe de Unidad</option>
							<option value="Otro">Director General</option>
						</select>
					</div>
					<input type="submit" class="btn btn-primary" name="rt" id="rt" value="Registrar Empleado">
				</div>
			</div>
		</form>
			
	</div>
</div> <!--fin principal-->

	
<?php require_once '../../includes/pie.php'; ?>
<?php require_once '../../includes/conexion.php';

	if (isset($_POST["rt"])){
        $nombre = $_POST ["nombre"];
        $id     = $_POST ["id"];
        $tlf    = $_POST ["tlf"];
        $correo = $_POST ["correo"];
		$dir    = $_POST ["dir"];
		$tipo   = $_POST ["tipo"];
    
		$sql="INSERT 
            INTO 
                profesores(nombreProfe, cedula_profe, telefonoProfe, correoProfe, direccionProfe, localidad) 
            VALUES 
				('$nombre','$id','$tlf','$correo','$dir', ' ')";

        $profesor=pg_Exec($db,$sql);
		if($tipo == 'interno'){
			$sql = "INSERT INTO 
                internos(cedula_Profe) 
            VALUES 
				('$id')";
		}else{
			$sql = "INSERT INTO 
                externos(cedula_Profe) 
            VALUES 
				('$id')";
		}
		$profesor=pg_Exec($db,$sql);
		if($profesor==false){
			var_dump('Error en la consulta');
		}else{
			header("Location:Mostrar_p.php");
		}

	} 

?>


<?php require_once '../../includes/cabecera.php'; ?>
				
<?php
	
?>
<!-- CAJA PRINCIPAL -->
<div id="">
    
	<div class="container">
		<h1>REGISTRO DE Dependencia</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
			<div class="card-header">
				<div class="container">
					<div class="form-group">
						<label for="" src="nombre">Empleado</label>
						<select name="tipo" class="form-control">
							<option value="interno">Juan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="" src="id">Solicitud de compra</label>
						<select name="tipo" class="form-control">
							<option value="interno">00000</option>
						</select>
					</div>
					<div class="form-group">
						<label for="" src="tlf">Nombre</label>
						<input type="text"  name="tlf" class="form-control" id="tlf" >
					</div>
					<div class="form-group">
						<label for="" src="correo">Centro de costo asociado</label>
						<input type="email"  name="correo" class="form-control" id="correo" >
					</div>
					
					<input type="submit" class="btn btn-primary" name="rt" id="rt" value="Registrar dependencia">
				</div>
			</div>
		</form>
			
	</div>
</div> <!--fin principal-->

<?php require_once '../../includes/lateral.php'; ?>
	
<?php require_once '../../includes/pie.php'; ?>
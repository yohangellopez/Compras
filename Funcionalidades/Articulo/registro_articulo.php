<?php require_once '../../includes/conexion.php';

 ?>

<?php require_once '../../includes/cabecera.php'; ?>
				
<?php
	
?>
<!-- CAJA PRINCIPAL -->
<div id="">
    
	<div class="container">
		<h1>REGISTRO DE ARTICULOS</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
			<div class="card-header">
				<div class="container">

					<div class="form-group">
						<label for="" src="cedula">Nombre</label>
						<input type="text" autofocus name="cedula1" class="form-control" id="cedula" required>
					</div>

            <div class="form-group">
              <label for="" src="cedula">Descripcion</label>
              <input type="text" autofocus name="cedula2" class="form-control" id="cedula" >
					</div>

					<div class="form-group">
						<label for="" src="nombre">Unidad de medida</label>
						<input type="text" name="titulo" class="form-control" id="nombre">
					</div>
          <div class="row">
            <div class="col-sm-12">
                <label for="" src="cedula">Precio ($)</label>
                <input type="text" name="titulo" class="form-control" id="nombre">
                <!-- <select class="form-control" name="cedula_profe">
                <?php 
                
                for ($j=0; $j < $filas; $j++):
                  ?>
                        <option value="<?=pg_result($profesor, $j, 0)?>"><?=pg_result($profesor, $j, 1)?></option>
                <?php
                    endfor;
                ?> 
                </select> -->
            </div>
          </div>
          
                    <!-- <div class="row">
                        <label>Tipo de tesis</label>
                        <a class="btn btn-primary" href="#" onclick="experimental();">Experimental</a>
                        <a class="btn btn-primary" href="#" onclick="instrumental();">Instrumental</a>
                    </div> -->
                    
<br>
                    <div id="padre">
      
                    </div>

                    <div id="padre2">
      
                    </div>
					
					<div class="form-group">
					
					<input type="submit" class="btn btn-primary" name="rt" id="rt" value="Registrar Articulo">
				</div>
			</div>
		</form>
			
	</div>
</div> <!--fin principal-->
<script>
  function experimental(){
     
    var padre = document.getElementById("padre2");
    var input = document.createElement("INPUT");  
    var div = document.createElement("div"); 
    var descripcion = document.createElement("INPUT");  
    
    div.class= 'row ';      
    input.type = 'text';
    input.class='form-control col-sm-6';
    input.name='experimental';
    input.placeholder = "Profesor que avala"

    
    div.appendChild(input);
    padre.appendChild(div);
  } 
  

  function instrumental(){
     
     var padre = document.getElementById("padre");
     var input = document.createElement("INPUT");  
     var div = document.createElement("div"); 
     var descripcion = document.createElement("INPUT");  
     var label = document.createElement("label");     
     
     div.class= 'row ';      
     input.type = 'text';
     input.class='form-control col-sm-6';
     input.name='nombreEmpresa';
     input.placeholder ="Nombre de la empresa";
 
     descripcion.type = 'text';
     descripcion.name = 'nombreTutor';
     descripcion.placeholder="Nombre del tutor empresarial";
     descripcion.class='form-control col-sm-10';
 
     
     div.appendChild(input);
     div.appendChild(descripcion);
     padre.appendChild(div);
   } 

   
  
</script>
	
<?php require_once '../../includes/pie.php'; ?>
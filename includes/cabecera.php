<?php require_once 'conexion.php'; ?>
<?php require_once '../../includes/helpers.php'; ?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Compras UCAB</title>
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css" />
		<!-- CSS only -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


		<!--Bootstrap-->
	</head>
	<body>
		<!-- CABECERA -->
		<header id="cabecera">
			<!-- LOGO -->
			<div id="logo">
				<a href="../Sesion/index.php">
					Escuela de Ing.Informática
				</a>
			</div>
			
			<!-- MENU -->
			<nav id="menu">
				<ul>
					
					<li>
						<a href="../Empleado/mostrar_empleado.php">Empleados</a>
					</li>
					<li>
						<a href="../Dependencia/mostrar_dependencia.php">Dependencias</a>
					</li>
					
					<li>
					
						<a href="../Articulo/mostrar_articulo.php">Articulos</a>
					</li>
					<li>
						<a href="../Proveedor/mostrar_proveedor.php">Proveedores</a>
					</li>
					<li>
						<a href="../Solicitud/mostrar_solicitud.php">Solicitudes de compras</a>
					</li>
					<!-- <li>
						<a href="mostrar_f.php">Formatos</a>
					</li> -->
					<li>
						<a href="cerrar_sesion.php">Cerrar Sesion</a>
					</li>
				</ul>
			</nav>
			
			<div class="clearfix"></div>
		</header>
		
		<div id="contenedor">
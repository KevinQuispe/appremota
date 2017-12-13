<?PHP
	$hostname_localhost="127.0.0.1";
	$database_localhost="bd_usuario";
	$username_localhost="root";
	$password_localhost="root";
	$json=array();
		
			$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
			$consulta="SELECT * FROM usuario";
			$resultado=mysqli_query($conexion,$consulta);
			while ($registro=mysqli_fetch_array($resultado)) {
				$json['usuario'][]=$registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
			
?>
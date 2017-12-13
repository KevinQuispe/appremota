<?PHP
	$hostname_localhost="127.0.0.1";
	$database_localhost="bd_usuario";
	$username_localhost="root";
	$password_localhost="root";

	$json=array();
		if (isset($_GET["DNI"]))  {
			$DNI=$_GET['DNI'];
		
			$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

			$consulta="SELECT DNI,NOMBRE,PROFESION FROM usuario WHERE DNI='{$DNI}'";
			$resultado =mysqli_query($conexion,$consulta);

			if ($registro=mysqli_fetch_array($resultado)) {
					$json['usuario'][]=$registro;
				}
				
			else{
				$resulta["DNI"]=0;
				$resulta["NOMBRE"]='No Registra';
				$resulta["PROFESION"]='No Registra';
				$json{'usuario'}[]=$resulta;
				echo json_encode($json);
			}
			mysqli_close($conexion);
			echo json_encode($json);
	}else{
				$resulta["success"]=0;
				$resulta["message"]='No retorna';
				$json{'usuario'}[]=$resulta;
				echo json_encode($json);
	}
?>
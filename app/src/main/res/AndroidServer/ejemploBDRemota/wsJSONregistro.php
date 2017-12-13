<?PHP
	$hostname_localhost="127.0.0.1";
	$database_localhost="bd_usuario";
	$username_localhost="root";
	$password_localhost="root";

	$json=array();
		if (isset($_GET["DNI"]) && isset($_GET["NOMBRE"]) && isset($_GET["PROFESION"])) {
			$DNI=$_GET['DNI'];
			$NOMBRE=$_GET['NOMBRE'];
			$PROFESION=$_GET['PROFESION'];
			$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
			$insert="INSERT INTO usuario(DNI,NOMBRE,PROFESION) values ('{$DNI}','{$NOMBRE}','{$PROFESION}')";
			$resultado_insert=mysqli_query($conexion,$insert);
			if ($resultado_insert) {
				$consulta="SELECT * FROM usuario WHERE DNI = '{$DNI}'";
				$resultado=mysqli_query($conexion,$consulta);

				if ($registro=mysqli_fetch_array($resultado)) {
					$json['usuario'][]=$registro;
				}
				mysqli_close($conexion);
				echo json_encode($json);
			}else{
				$resulta["DNI"]=0;
				$resulta["NOMBRE"]='No Registra';
				$resulta["PROFESION"]='No Registra';
				$json{'usuario'}[]=$resulta;
				echo json_encode($json);
			}
	}else{
				$resulta["DNI"]=0;
				$resulta["NOMBRE"]='No retorna';
				$resulta["PROFESION"]='No retorna';
				$json{'usuario'}[]=$resulta;
				echo json_encode($json);
	}
?>
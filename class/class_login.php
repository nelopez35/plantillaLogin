<?php
session_start();
require_once("Db.php");
class blog
{
	public function nueva_sesion()
	{
		$nombre = $_POST['nom'];
		$password = $_POST['pass'];
		$db = new Db();
		

	    $query = "SELECT 
		* 
		FROM
		usuarios
		WHERE username='".strip_tags($nombre)."';";

		
		$resultado =$db->select($query);
		$resultado = $resultado[0];
		
	
		if (count($resultado) == 0)
		{
			header("Location:nueva_sesion.php?usuario=no_existe");
		}else{
			

			if (password_verify($password,$resultado["password"])) {

				$_SESSION['nick'] = $resultado['username'];
				header("Location:logueado.php");	
				
			}else{

				header("Location:nueva_sesion.php?usuario=usuario_incorrecto");
			}

		}
			
	}
}
?>

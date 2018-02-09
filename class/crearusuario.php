<?php 
require_once("conexion.php");
$query = "INSERT INTO usuarios VALUES (1,'nicolas','".password_hash("123456",PASSWORD_BCRYPT)."');";
		//ejecutamos la consulta y guardamos el resultado en la variable resultado
$resultado = mysqli_query(Conectar::con(),$query);



 ?>
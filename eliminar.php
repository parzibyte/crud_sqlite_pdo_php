<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
if (empty($_GET["id"])) {
	exit("No hay ID");
}

#Si llegamos hasta aquí es porque los datos al menos están definidos
include_once __DIR__ . "/base_de_datos.php"; #Al incluir este script, podemos usar $baseDeDatos

# creamos una variable que tendrá la sentencia
$sentencia = $baseDeDatos->prepare("DELETE FROM videojuegos WHERE id = :id");



#Pasar los datos...
$sentencia->bindParam(":id", $_GET["id"]);#Aquí pasamos el ID
$resultado = $sentencia->execute();
if($resultado === true){
	echo "Videojuego eliminado correctamente";
	echo '<br><a href="3_tabla_dinamica.php">Ver los videojuegos</a>';
}else{
	echo "Lo siento, ocurrió un error";
}
?>
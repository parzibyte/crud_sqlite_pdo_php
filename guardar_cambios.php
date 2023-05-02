<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/

if (empty($_POST["id"])) { # En este caso también necesitamos al ID
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

if (empty($_POST["titulo"])) {
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

if (empty($_POST["anio"])) {
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

if (empty($_POST["genero"])) {
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

#Si llegamos hasta aquí es porque los datos al menos están definidos
include_once __DIR__ . "/base_de_datos.php"; #Al incluir este script, podemos usar $baseDeDatos

# creamos una variable que tendrá la sentencia
$sentencia = $baseDeDatos->prepare("UPDATE videojuegos 
	SET anio = :anio,
	titulo = :titulo,
	genero = :genero
	WHERE id = :id");



#Pasar los datos...
$sentencia->bindParam(":id", $_POST["id"]);#Aquí pasamos el ID
$sentencia->bindParam(":anio", $_POST["anio"]);
$sentencia->bindParam(":titulo", $_POST["titulo"]);
$sentencia->bindParam(":genero", $_POST["genero"]);
$resultado = $sentencia->execute();
if($resultado === true){
	echo "Videojuego guardado correctamente";
	echo '<br><a href="3_tabla_dinamica.php">Ver los videojuegos</a>';
}else{
	echo "Lo siento, ocurrió un error";
}
?>
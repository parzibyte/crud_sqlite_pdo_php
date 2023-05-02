<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/

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
$sentencia = $baseDeDatos->prepare("INSERT INTO videojuegos(anio, titulo, genero)
	VALUES(:anio, :titulo, :genero);");


# Debemos pasar a bindParam las variables, no podemos pasar el dato directamente
# debido a que la llamada es por referencia


$sentencia->bindParam(":anio", $_POST["anio"]);
$sentencia->bindParam(":titulo", $_POST["titulo"]);
$sentencia->bindParam(":genero", $_POST["genero"]);
$resultado = $sentencia->execute();
if($resultado === true){
	echo "Videojuego registrado correctamente";
}else{
	echo "Lo siento, ocurrió un error";
}
?>
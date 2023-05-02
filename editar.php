<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
if (empty($_GET["id"])) {
	exit("No hay id");
}

include_once __DIR__ . "/base_de_datos.php";
$sentencia = $baseDeDatos->prepare("SELECT * FROM videojuegos WHERE id = :id LIMIT 1;");
$sentencia->bindParam(":id", $_GET["id"]);
$sentencia->execute();
$videojuego = $sentencia->fetch(PDO::FETCH_OBJ);
if ($videojuego === FALSE) { #Si no existe ningún registro con ese id
	exit("No hay ningún videojuego con ese ID");
}

# si llegamos hasta aquí es porque el videojuego sí existe

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar un videojuego</title>
</head>
<body>
	<form action="guardar_cambios.php" method="post">
		<!-- Guardamos el ID del videojuego para enviarlo con los demás datos -->
		<!-- Este ID no debe ser cambiado, pues con él haremos el update -->
		<input name="id" type="hidden" value="<?php echo $videojuego->id ?>">
		<label for="titulo">Título</label>
		<input value="<?php echo $videojuego->titulo; ?>" type="text" id="titulo" name="titulo" required placeholder="El título del videojuego">
		<br>
		<br>
		<label for="anio">Año</label>
		<input value="<?php echo $videojuego->anio; ?>" type="number" id="anio" name="anio" required placeholder="Escribe el año del videojuego">
		<br>
		<br>
		<label for="genero">Género</label>
		<input value="<?php echo $videojuego->genero; ?>" type="text" id="genero" name="genero" required placeholder="Escribe el género del videojuego">
		<br><br>
		<button type="submit">Guardar</button>
	</form>
	<br>
	<a href="3_tabla_dinamica.php">Ver todos los videojuegos</a>
</body>
</html>
<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
include_once __DIR__ . "/base_de_datos.php";
$definicionTabla = "CREATE TABLE IF NOT EXISTS videojuegos(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	anio INTEGER NOT NULL,
	titulo TEXT NOT NULL,
	genero TEXT NOT NULL
);";
#Podemos usar $baseDeDatos porque incluimos el archivo que la crea
$resultado = $baseDeDatos->exec($definicionTabla);
echo "Tablas creadas correctamente";
?>
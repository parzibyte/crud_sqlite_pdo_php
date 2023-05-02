<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
$baseDeDatos = new PDO("sqlite:" . __DIR__ . "/videojuegos.db");
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
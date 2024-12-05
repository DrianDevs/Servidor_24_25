<?php
require_once("../autoload.php");


//Videoclub
$vc = new Videoclub("Severo 8A");

//Soportes
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1)->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es", "16:9")->incluirDvd("Origen", 4.5, "es,en,fr", "16:9")->incluirDvd("El Imperio Contraataca", 3, "es,en", "16:9");
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107)->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

//Socios
$vc->incluirSocio("Amancio Ortega", 2, "admin", "admin")->incluirSocio("Pablo Picasso", 2, "usuario", "usuario");

//Alquileres
$vc->alquilaSocioProducto(2, 4);
$vc->alquilarSocioProductos(1, [2, 3]);
?>
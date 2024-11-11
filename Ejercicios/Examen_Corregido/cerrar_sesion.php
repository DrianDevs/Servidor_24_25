<?php
//evita el almacenamiento en caché
header(header: 'Cache-Control: no-store, no-cache, must-revalidate');


session_start();
$aux = session_id();
print_r(value: nl2br(string: "\n El SID actual antes de iniciar el código de cierre de sesion es: " . session_id() . "\n"));


if ($_GET['cerrar_sesion']) {
    session_unset(); // Destruye todas las variables de sesión
    session_destroy();
    $aux = session_id();
    print_r(value: nl2br(string: "\n El SID despues de usar destroy: " . session_id() . "\n" . "Confirmándose que -he cerrado la Sesion del usuario."));
}
;
//si este código no se ejecuta por pantalla, es que he borrado también los datos de la matriz de sesión.
foreach ($_SESSION as $key => $value) {
    echo "Pero que no he borrado los valores de Clave y valor en la matriz Sesion una vez destruida la sesion son. Clave: $key, Valor: $value \n <br>";
}
;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>

    </main>

    <section>
        <h3>Ha cerrado su sesión</h3>
    </section>

    <nav>
        <form action="index.php" method="post">
            <input type="submit" value="Página de Inicio de Sesión">
        </form>
    </nav>
</body>

</html>
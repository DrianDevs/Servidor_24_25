<?php
//evita el almacenamiento en caché
header(header: 'Cache-Control: no-store, no-cache, must-revalidate');
session_start();

if ($_GET['cerrar_sesion']) {
    session_unset();
    session_destroy();
}
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
        <form action="../index.php" method="post">
            <input type="submit" value="Página de Inicio de Sesión">
        </form>
    </nav>
</body>

</html>
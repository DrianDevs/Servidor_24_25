<?php
if (isset($_POST['accion'])) {
    echo "Has presionado el botón 'Enviar'";
} else if (isset($_POST['borrar'])) {
    echo "Has presionado el botón 'Borrar'";
}
?>
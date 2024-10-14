<?php
$email = $_POST["email"];
$url = $_POST["url"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Correo electrónico no válido</p>";
} else {
    echo "<p>Correo electrónico válido</p>";
}

if (!filter_var($url, FILTER_VALIDATE_URL)) {
    echo "<p>URL no válida</p>";
} else {
    echo "<p>URL válida</p>";
}

<?php
$edad = $_REQUEST["edad"];
if (is_numeric($edad)) {
    print "<p>Ha escrito un número: $edad</p>";
} else {
    print "<p>No ha escrito un número: $edad</p>";
}
/*
if (ctype_digit($edad)) {
    print "<p>Ha escrito un número: $edad</p>";
} else {
    print "<p>No ha escrito un número: $edad</p>";
}
*/
?>
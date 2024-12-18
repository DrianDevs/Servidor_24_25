<?php
// Ejemplo de uso
$empTiempoCompleto = new EmpleadoTiempoCompleto(
    "Juan",
    "Perez",
    2500
);
$empleadoPorHoras = new EmpleadoPorHoras("Maria", "Lopez", 15, 160);
echo "<br>Información del empleado a tiempo completo: " .
    $empTiempoCompleto->getInformacion() . "<br>";
echo "<br>Sueldo del empleado a tiempo completo: " .
    $empTiempoCompleto->calcularSueldo() . "<br>";
echo "<br>Información del empleado por horas: " .
    $empleadoPorHoras->getInformacion() . "<br>";
echo "<br>Sueldo del empleado a tiempo completo: " .
    $empleadoPorHoras->calcularSueldo() . "<br>";
$clon = $empTiempoCompleto->clonarEmpleado();
echo "<br>Información del clon coincide con la de su padre: " .
    $clon->getInformacion() . "<br>";
// Utilizando introspección para obtener información sobre las clases
echo "<br>Las clases definidas en el método EmpleadoTiempoCompleto
son;<br>";
var_dump(get_class_methods('EmpleadoTiempoCompleto'));
?>
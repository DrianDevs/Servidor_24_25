<?php
ob_start();
require 'vendor/autoload.php';

use PhpZip\Zip;

function crearPDF()
{
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(40, 10, 'PDF descargado.');
    return $pdf;
}


if (isset($_GET['download'])) {
    $pdf = crearPDF();
    ob_clean();
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="documento.pdf"');
    $pdf->Output('D', 'documento.pdf');
    exit();
}
ob_end_flush();


if (isset($_GET['file'])) {

    if ($_GET['file'] == 'text') {
        $nombreArchivo = "archivo.txt";
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $nombreArchivo);

        readfile($nombreArchivo);
        exit;
    } elseif ($_GET['file'] == 'image') {
        $formato_imagen = $_GET['format'];
        if ($formato_imagen == 'jpeg') {
            $nombreArchivo = "imagen.jpg";
            $mime = 'image/jpeg';
        } elseif ($formato_imagen == 'png') {
            $nombreArchivo = "imagen.png";
            $mime = 'image/png';
        } elseif ($formato_imagen == 'gif') {
            $nombreArchivo = "imagen.gif";
            $mime = 'image/gif';
        } else {
            echo 'Formato de imagen no válido';
            exit;
        }
        // Establecer el tipo de contenido y el nombre del fichero
        header('Content-Type: ' . $mime);
        header('Content-Disposition: attachment; filename="' . $nombreArchivo);
        // Leer el contenido del fichero
        readfile($nombreArchivo);
        exit;
    } elseif ($_GET['file'] == 'zip') {
        // Crear un archivo ZIP
        $zip = new Zip();
        $zip->addFile('archivo.txt', 'archivo.txt');
        $zip->addFile('imagen.jpg', 'imagen.jpg');
        $zip->addFile('imagen.png', 'imagen.png');
        $zip->addFile('imagen.gif', 'imagen.gif');
        // Establecer el nombre del archivo ZIP
        $nombre_zip = 'archivos.zip';
        // Establecer el tipo de contenido y el nombre del fichero
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $nombre_zip);
        // Enviar el archivo ZIP
        echo $zip->getZip();
        exit;
    } else {
        echo 'El fichero no existe';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Descargar fichero de texto</h2>
    <a href="?file=text">Descargar fichero de texto</a>
    <h2>Descargar PDF</a>
        <h2>Descargar imagenes</h2>
        <a href="?file=image&format=jpeg">Descargar imagen en formato JPEG</a><br>
        <a href="?file=image&format=png">Descargar imagen en formato PNG</a><br>
        <a href="?file=image&format=gif">Descargar imagen en formato GIF</a>
        <h2>Descargar ZIP</h2>
        <a href="?file=zip">Descargar archivos en formato ZIP</a>
</body>

</html>
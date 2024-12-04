<?php
header(header: 'Cache-Control: no-store, no-cache, must-revalidate');

session_start();
session_unset();
session_destroy();

header('Location: index.php');
exit;
?>
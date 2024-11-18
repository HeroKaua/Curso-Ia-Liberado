<?php
// logout.php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Redireciona para a página inicial
exit();
?>

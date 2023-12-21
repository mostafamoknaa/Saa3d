<?php
session_start();
session_destroy();
header('REFRESH:1;URL=login&logout.php');
?>

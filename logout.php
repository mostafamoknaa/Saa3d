<?php
session_start();
session_destroy();
header('REFRESH:1;URL=welcome.php');
?>
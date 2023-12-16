<?php
session_start();
unset($_SESSION['Login']);
unset($_SESSION['Admin']);
return header('Location: ../../index.php');
exit;

<?php
session_destroy();
session_unset();
$_SESSION = [];
header('Location: login.php?logout="Успешно излязхоте от профила си!"');

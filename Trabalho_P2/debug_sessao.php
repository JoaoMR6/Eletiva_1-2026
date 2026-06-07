<?php
session_start();
echo "ID da Sessão: " . session_id() . "<br>";
print_r($_SESSION);
?>
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('LOCATION: index.php');
}

<?php
session_start();
if (!empty($_SESSION['name'])) {
    header('Location:main.php');
} elseif (!empty($_SESSION['admin'])) {
    require 'admin.php';
} else {
    require 'login.html';
}

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: adm_login.php');
    exit;
}
require_once '../model/Eventos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    if (removerEvento($_POST['id'])) {
        header('Location: cadastrar_evento.php');
        exit;
    } else {
        echo "Erro ao remover evento.";
    }
}
?>
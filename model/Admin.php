<?php
require_once __DIR__ . '/../config/conn.php';

function loginAdmin($usuario, $senha) {
    global $conn;
    $sql = "SELECT * FROM admins WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usuario]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($admin && hash('sha256', $senha) === $admin['senha']) {
        return true;
    }
    return false;
}

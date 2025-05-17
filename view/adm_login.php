<?php
session_start();
require_once '../model/Admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    if (loginAdmin($usuario, $senha)) {
        $_SESSION['admin'] = $usuario;
        header('Location: cadastrar_evento.php');
        exit;
    } else {
        echo "<p>Usuário ou senha inválidos!</p>";
    }
}
?>
<form method="post">
    Usuário: <input type="text" name="usuario" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>
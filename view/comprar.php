<?php
include_once __DIR__ . '/../public/includes/tamplate.php';

include_once __DIR__ . '/../model/Vendas.php';

$id = $_GET['id'];
$evento = buscarEventoPorId($id);
?>
<?php  if ($_SERVER['REQUEST_METHOD'] === 'POST'):?>
    <?php 
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $quantidade = (int)$_POST['quantidade'];
        if ($quantidade < 1) $quantidade = 1;
    ?>
    <?php  if(!criarVenda($id, $nome, $email, $quantidade)): ?>
        <?php header("Location: sucesso.php");?>
        
    <?php else :?> 
        <p>Não foi possível realizar a compra. Verifique a quantidade disponível.</p>
        <a href="eventos.php">Voltar aos eventos</a>
    <?php endif?>
<?php endif?>

<h2>Comprar Ingresso para <?= htmlspecialchars($evento['nome']) ?></h2>
<p>Ingressos disponíveis: <?= $evento['quantidade'] ?></p>
<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    Quantidade: <input type="number" name="quantidade" min="1" max="<?= $evento['quantidade'] ?>" required><br>
    <button type="submit">Comprar</button>
</form>
<a href="eventos.php">Voltar</a>
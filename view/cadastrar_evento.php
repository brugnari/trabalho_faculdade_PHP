<h1><a href="index.php">Home</a></h1>
<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: adm_login.php');
        exit;
    }
    require_once '../model/Eventos.php';
    $eventos = listarEventos(); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $data = $_POST['data'];
        $local = $_POST['local'];
        $imagem = $_POST['imagem'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        
        if (cadastrarEvento($nome, $descricao, $data, $local, $imagem, $preco, $quantidade)) {
            header('Location: cadastrar_evento.php?sucesso=1');
            exit;
        }
    }
?>
<h1>Cadastrar evento</h1>
<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Descrição: <textarea name="descricao"></textarea><br>
    Data: <input type="date" name="data" required><br>
    Local: <input type="text" name="local"><br>
    Imagem: <input type="text" name="imagem"><br>
    Preço: <input type="number" step="0.01" name="preco" required><br>
    Quantidade: <input type="number" name="quantidade" required><br>
    <button type="submit">Cadastrar Evento</button>
    
</form>

<?php
if (isset($_GET['sucesso'])) {
    echo "<p>Evento cadastrado com sucesso!</p>";
}
?>

<?php foreach ($eventos as $evento): ?>
    
    <form method="post" action="remover_evento.php" style="display:inline;">
        <div>
            <p>nome do evento:<?=$evento['nome']?></p>
            <p>data:<?=$evento['data']?></p>
            <input type="hidden" name="id" value="<?= $evento['id'] ?>">
            <button type="submit" onclick="return confirm('Tem certeza que deseja remover este evento?')">Remover</button>
        </div>
    </form>
<?php endforeach; ?>
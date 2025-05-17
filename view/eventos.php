<?php
include_once __DIR__ . '/../public/includes/tamplate.php';
include_once __DIR__ . '/../model/Eventos.php';
$eventos= listarEventos();
?>
<?php foreach ($eventos as $evento): ?>
    <div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <?=$evento['nome']?>
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong><?= htmlspecialchars($evento['descricao']) ?><br> </strong><br>

            Data: <?= htmlspecialchars($evento['data']) ?><br>
            Local: <?= htmlspecialchars($evento['local']) ?><br>
            Preço: R$ <?= number_format($evento['preco'], 2, ',', '.') ?><br>
            Ingressos disponíveis: <?= $evento['quantidade'] ?><br>
            <a href="comprar.php?id=<?=$evento['id']?>">Reservas Aqui!</a>
            <img src="#" alt="<?=$evento['nome']?>">
        </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>

<?php include __DIR__ . '/../public/includes/footer.php';?>
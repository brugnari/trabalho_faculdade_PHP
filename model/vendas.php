<?php 
require_once __DIR__ .'/../config/conn.php';
require_once __DIR__ .'/Eventos.php';

function criarVenda($evento_id,$nome,$email,$quantidade){
    $evento = buscarEventoPorId( $evento_id);
    global $conn;

    if (!$evento||$evento['quantidade'] <$quantidade) {
        return false;
    }
    if (!diminuirQuantidadeIngresso($evento_id,$quantidade)) {
        return false;
    }

    $sql="INSERT INTO vendas (evento_id,nome_comprador,email,quantidade) VALUES(?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$evento_id,$nome,$email,$quantidade]);

}
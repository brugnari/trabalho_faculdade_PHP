<?php 
require_once __DIR__ .'/../config/conn.php';

function listarEventos(){
    global $conn;
    $sql ="SELECT * FROM eventos";
    $stmt =$conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function buscarEventoPorId($id){
    global $conn;
    $sql = "SELECT * FROM eventos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);

}
function diminuirQuantidadeIngresso ($evento_id,$quantidade){
    global $conn;
    $sql = "UPDATE eventos SET quantidade = quantidade - ? WHERE id = ? AND quantidade >= ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$quantidade,$evento_id,$quantidade]);
}
function cadastrarEvento($nome, $descricao, $data, $local, $imagem, $preco, $quantidade) {
    global $conn;
    $sql = "INSERT INTO eventos (nome, descricao, data, local, imagem, preco, quantidade) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$nome, $descricao, $data, $local, $imagem, $preco, $quantidade]);
}


function removerEvento($id) {
    global $conn;
    // Remove vendas relacionadas
    $sqlVendas = "DELETE FROM vendas WHERE evento_id = ?";
    $stmtVendas = $conn->prepare($sqlVendas);
    $stmtVendas->execute([$id]);

    // Agora remove o evento
    $sqlEvento = "DELETE FROM eventos WHERE id = ?";
    $stmtEvento = $conn->prepare($sqlEvento);
    return $stmtEvento->execute([$id]);
}
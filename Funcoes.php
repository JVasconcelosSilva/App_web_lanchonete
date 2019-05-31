<?php

Class Funcoes extends Banco {

    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->conectar();
    }

    public function obterRegistros($tipo) {
        $instrucao = $this->pdo->query("SELECT * FROM $this->nome WHERE tipo_produto = '$tipo'");
        return $instrucao->fetchAll();
    }

    public function obterProduto($id) {
        $instrucao = $this->pdo->query("SELECT * FROM $this->nome WHERE id_produto = '$id'");
        return $instrucao->fetchAll();
    }

    public function gravarCarrinho($id_produto, $img_ref, $vl_produto, $nm_produto, $qt) {
        $instrucao = $this->pdo->query("INSERT INTO $this->nome (id_produto, nm_produto, img_ref, vl_produto, qt_produto) VALUES ($id_produto,'$nm_produto','$img_ref',$vl_produto,$qt)");
        return $instrucao->fetchAll();
    }

    public function pesquisarCarrinho() {
        $instrucao = $this->pdo->query("SELECT * FROM $this->nome");
        return $instrucao->fetchAll();
    }

    public function deletarItemCarrinho($id_item_carrinho) {
        $instrucao = $this->pdo->query("DELETE FROM $this->nome WHERE id_item_carrinho = $id_item_carrinho");
        return $instrucao->fetchAll();
    }
    /*BY ANDREW*/
    public function confirmaPedido() {
        $instrucao = $this->pdo->query("DELETE FROM $this->nome");
        return $instrucao->fetchAll();
    }

    public function cadastrarUsuario($nome, $cpf, $login, $senha) {
        $instrucao = $this->pdo->query("INSERT INTO $this->nome (login, senha, nome_usuario, cpf) VALUES ('$login', '$senha', '$nome', $cpf)");
        return $instrucao->fetchAll();
    }

    public function loginUsuario($login) {
        $instrucao = $this->pdo->query("SELECT * FROM $this->nome WHERE login='$login'");
        if (!is_null($instrucao)) {
            return $instrucao->fetchAll();
        } else {
            return null;
        }
    }

    public function editarUsuario($id, $nome, $cpf) {
        $instrucao = $this->pdo->query("UPDATE $this->nome SET nome_usuario = '$nome', cpf = '$cpf' WHERE id_usuario = $id");
        return $instrucao->fetchAll();
    }
    
    public function deletarUsuario($id) {
        $instrucao = $this->pdo->query("DELETE FROM $this->nome WHERE id_usuario = $id");
        return $instrucao->fetchAll();
    }

    public function __get($name) {
        return $this->$name;
    }

}

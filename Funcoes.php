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
    
    public function confirmaPedido() {
        $instrucao = $this->pdo->query("DELETE FROM $this->nome");
        return $instrucao->fetchAll();
    }
    
//    public function gravarPedido($registro, $id_produto, $nm_produto, $img_ref, $vl_produto, $qt_produto) {
//        $instrucao = $this->pdo->query("INSERT INTO $this->nome (id_usuario, id_produto, nm_produto, img_ref, vl_produto, qt_produto) VALUES ($registro, $id_produto,'$nm_produto','$img_ref',$vl_produto,$qt_produto)");
//        return $instrucao->fetchAll();
//    }
//    
//    public function pesquisarPedido($registro) {
//        $instrucao = $this->pdo->query("SELECT * FROM $this->nome WHERE id_usuario = $registro");
//        return $instrucao->fetchAll();
//    }

    /* USADO PARA INSERIR LANCHES NO CARDÁPIO */

//    public function inserir($id, $nome, $descricao, $tipo, $valor, $img)
//    {
//        $instrucao = $this->pdo->query("INSERT INTO $this->nome VALUES ($id, '$nome', '$descricao', '$tipo', '$valor', '$img')");
//        return $instrucao->fetchAll();
//    }

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
    
//    public function pesquisarIdUsuario($usuario) {
//        $instrucao = $this->pdo->query("SELECT id_usuario FROM $this->nome WHERE login = '$usuario'");
//        return $instrucao->fetchAll();
//    }

    public function __get($name) {
        return $this->$name;
    }

}

<?php

class Banco {

    private $dsn = 'sqlite:lanchonete.sqlite';
    protected $pdo;

    public function conectar() {
        $this->pdo = new PDO($this->dsn);
    }

}

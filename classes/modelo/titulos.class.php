<?php

class Titulos{
    
    private $id;
    private $nome;
    private $valor;
    private $quantidade;
    private $status;
    
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setValor($valor): void {
        $this->valor = $valor;
    }

    public function setQuantidade($quantidade): void {
        $this->quantidade = $quantidade;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }



    
}
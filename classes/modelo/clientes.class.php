<?php

class Clientes{
    
    private $id;
    private $nome;
    private $email;
    private $dataCadastro;
    private $status;
  
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
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

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setDataCadastro($dataCadastro): void {
        $this->dataCadastro = $dataCadastro;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

   
    
    
}
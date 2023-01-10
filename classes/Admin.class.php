<?php

class Admin {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $dataCadastro;
    private $status;
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }

    function setDataCadastro($dataCadastro): void {
        $this->dataCadastro = $dataCadastro;
    }

    function setStatus($status): void {
        $this->status = $status;
    }


    
}

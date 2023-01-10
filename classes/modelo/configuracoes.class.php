<?php

class Configuracoes{
    
    private $id;
    private $multa;
    private $prazo;
    private $empresa;
    private $empresa_id;

    public function getId() {
        return $this->id;
    }

    public function getMulta() {
        return $this->multa;
    }

    public function getPrazo() {
        return $this->prazo;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getEmpresa_id() {
        return $this->empresa_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setMulta($multa): void {
        $this->multa = $multa;
    }

    public function setPrazo($prazo): void {
        $this->prazo = $prazo;
    }

    public function setEmpresa($empresa): void {
        $this->empresa = $empresa;
    }

    public function setEmpresa_id($empresa_id): void {
        $this->empresa_id = $empresa_id;
    }


    
}
<?php

class Locacao{
    
    private $id;
    private $dt_retirada;
    private $dt_entrega;
    private $dt_prevista;
    private $status;
    private $valorTotal;
    private $valorMulta;
    private $valorSubTotal;
    private $formaPgto;
    private $cliente;
   
    
    
    public function getId() {
        return $this->id;
    }

    public function getDt_retirada() {
        return $this->dt_retirada;
    }

    public function getDt_entrega() {
        return $this->dt_entrega;
    }

    public function getDt_prevista() {
        return $this->dt_prevista;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function getValorMulta() {
        return $this->valorMulta;
    }

    public function getValorSubTotal() {
        return $this->valorSubTotal;
    }

    public function getFormaPgto() {
        return $this->formaPgto;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setDt_retirada($dt_retirada): void {
        $this->dt_retirada = $dt_retirada;
    }

    public function setDt_entrega($dt_entrega): void {
        $this->dt_entrega = $dt_entrega;
    }

    public function setDt_prevista($dt_prevista): void {
        $this->dt_prevista = $dt_prevista;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function setValorTotal($valorTotal): void {
        $this->valorTotal = $valorTotal;
    }

    public function setValorMulta($valorMulta): void {
        $this->valorMulta = $valorMulta;
    }

    public function setValorSubTotal($valorSubTotal): void {
        $this->valorSubTotal = $valorSubTotal;
    }

    public function setFormaPgto($formaPgto): void {
        $this->formaPgto = $formaPgto;
    }

    public function setCliente($cliente): void {
        $this->cliente = $cliente;
    }



    
}
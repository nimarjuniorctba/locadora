<?php

class itens_locacao{
    
    private $id;
    private $titulo;
    private $locacao;

    
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getLocacao() {
        return $this->locacao;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setLocacao($locacao): void {
        $this->locacao = $locacao;
    }


    
    



    
}
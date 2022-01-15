<?php

class NehnutelnostItem {

    private $nazov;
    private $typ;
    private $popis;
    
    private $adresaId;
    private $maklerId;
    private $vlasnikId;

    public function getNazov() {
        return $this->nazov;
    }
   
    public function setNazov($nazov) {
        $this->nazov = $nazov;
        return $this;
    }
   
    public function getTyp() {
        return $this->typ;
    }
   
    public function setTyp($typ) {
        $this->typ = $typ;
        return $this;
    }

    public function getPopis() {
        return $this->popis;
    }
   
    public function setPopis($popis) {
        $this->popis = $popis;
        return $this;
    }



    public function getAdresaId() {
        return $this->adresaId;
    }
   
    public function setAdresaId($id) {
        $this->adresaId = $id;
        return $this;
    }

    public function getMaklerId() {
        return $this->maklerId;
    }
   
    public function setMaklerId($id) {
        $this->maklerId = $id;
        return $this;
    }

    public function getVlasnikId() {
        return $this->vlasnikId;
    }
   
    public function setVlasnikId($id) {
        $this->vlasnikId = $id;
        return $this;
    }

    public function setAll($nazov ,$typ ,$popis) {
        $this->nazov = $nazov;
        $this->typ = $typ;
        $this->popis = $popis;
        return $this;
    }


}


?>


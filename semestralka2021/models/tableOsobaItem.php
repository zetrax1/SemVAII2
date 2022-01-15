<?php

class OsobaItem 
{

    private $meno;
    private $priezvisko;
    private $email;
    private $heslo;
    private $adresaId;

    public function getMeno() {
        return $this->meno;
    }
   
    public function setMeno($meno) {
        $this->meno = $meno;
        return $this;
    }

   
    public function getPriezvisko() {
        return $this->priezvisko;
    }
   
    public function setPriezvisko($priezvisko) {
        $this->priezvisko = $priezvisko;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }
   
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }


    public function getHeslo() {
        return $this->heslo;
    }
   
    public function setHeslo($heslo) {
        $this->heslo = $heslo;
        return $this;
    }

    public function getAdresaId() {
        return $this->adresaId;
    }
   
    public function setAdresaId($id) {
        $this->adresaId = $id;
        return $this;
    }

    public function setAll($meno ,$priezvisko ,$email) {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->email = $email;
        return $this;
    }


}


?>


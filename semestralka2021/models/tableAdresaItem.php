<?php

class AdresaItem 
{
    private $mesto;
    private $ulica;
    private $psc;

    public function getMesto() {
        return $this->mesto;
    }
   
    public function setMesto($mesto) {
        $this->mesto = $mesto;
        return $this;
    }

    public function getUlica() {
        return $this->ulica;
    }
   
    public function setUlica($ulica) {
        $this->ulica = $ulica;
        return $this;
    }

    public function getPsc() {
        return $this->psc;
    }
   
    public function setPsc($psc) {
        $this->psc = $psc;
        return $this;
    }

    public function setAll($mesto ,$ulica ,$psc) {
        $this->mesto = $mesto;
        $this->ulica = $ulica;
        $this->psc = $psc;
        return $this;
    }

}


?>



  <?php

class obrazokItem 
{
    private $id;
    private $name;
    private $description;
    private $source;
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getSource() {
        return $this->source;
    }
   

    public function setAll($id ,$nazov ,$popis,$location) {
        $this->id = $id;
        $this->name = $nazov;
        $this->description = $popis;
        $this->source = $location;
        return $this;
    }

}



?>





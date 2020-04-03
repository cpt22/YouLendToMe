<?php 
class Card {
    private $number;
    private $expMonth;
    private $expYear;
    private $cvv;
    private $id;
    
    public function __construct($number, $expMonth, $expYear, $cvv, $id) {
        $this->number = $number;
        $this->expMonth = $expMonth;
        $this->expYear = $expYear;
        $this->cvv = $cvv;
        $this->id = $id;
    }
    
    public function getNumber() {
        return $this->number;
    }
    
    public function getRedactedNumber() {
        $pre = substr($this->number, 0, strlen($this->number)-3);
        $post = substr($this->number, strlen($pre)-1);
        $tmp = "";
        for ($i = 0; $i < strlen($pre); $i++) {
            $tmp = $tmp . "*";
        }
        $tmp = $tmp . $post;
        return $tmp;
    }
    
    public function getExpMonth() {
        return $this->expMonth;
    }
    
    public function getExpYear() {
        return $this->expYear;
    }
    
    public function getCVV() {
        return $this->cvv;
    }
    
    public function getID() {
        return $this->id;
    }
}
?>
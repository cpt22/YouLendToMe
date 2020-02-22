<?php 
class Card {
    private $number;
    private $expMonth;
    private $expYear;
    private $cvv;
    
    public function __construct($number, $expMonth, $expYear, $cvv) {
        $this->number = $number;
        $this->expMonth = $expMonth;
        $this->expYear = $expYear;
        $this->cvv = $cvv;
    }
    
    public function getNumber() {
        return $this->number;
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
}
?>
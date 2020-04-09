<?php
class Address {
    private $line1;
    private $line2;
    private $city;
    private $state;
    private $zipcode;
    private $id;
    
    public function __construct($line1, $line2, $city, $state, $zipcode, $id) {
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->city = $city;
        $this->state = $state;
        $this->zipcode = $zipcode;
        $this->id = $id;
    }
    
    public function getLine1() {
        return $this->line1;
    }
    
    public function getLine2() {
        return $this->line2;
    }
    
    public function getCity() {
        return $this->city;
    }
    
    public function getState() {
        return $this->state;
    }
    
    public function getZipcode() {
        return $this->zipcode;
    }
    
    public function getID() {
        return $this->id;
    }
}
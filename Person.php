<?php

class Person {
    private $name;
    private $address;
    private $age;
    private $companyName;

    public function __construct($name, $address, $age, $companyName) {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
        $this->companyName = $companyName;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getAge() {
        return $this->age;
    }

     public function getcompanyName() {
        return $this->companyName;
    }

    public function __toString() {
        return $this->name . " | " . $this->address . " | " . $this->age . " | " . $this->companyName;
    }
}
?>
        

    

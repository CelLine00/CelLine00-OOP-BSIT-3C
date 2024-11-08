<?php

require_once 'Person.php';

abstract class Employee extends Person {
    private $companyName;

    public function __construct($name, $address, $age, $companyName)
        {
        parent::__construct($name, $address, $age, $companyName);
    }

    public function getId() {
        return $this->id;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function __toString() {
        return parent::__toString() . " | ID: " . $this->id;
    }
}
?>

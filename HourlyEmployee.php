<?php

class HourlyEmployee {
    private $name;
    private $hoursWorked;
    private $hourlyRate;

    public function __construct($name, $address, $age, $companyName, $id, $hoursWorked, $hourlyRate) {
        $this->name = $name;
        $this->hoursWorked = $hoursWorked;
        $this->hourlyRate = $hourlyRate;
    }

    public function calculateEarnings() {
        return $this->hoursWorked * $this->hourlyRate;
    }

    public function __toString() {
        return "HourlyEmployee: {$this->name}, Hours Worked: {$this->hoursWorked}, Hourly Rate: {$this->hourlyRate}";
    }
}

?>

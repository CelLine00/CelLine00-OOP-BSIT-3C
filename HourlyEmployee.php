<?php
require_once 'Employee.php';
class HourlyEmployee extends Employee
{
    private $hoursWorked;
    private $rate;

    public function __construct($name, $address, $age, $companyName, $id, $hoursWorked, $rate) {
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

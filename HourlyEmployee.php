<?php
require_once 'Employee.php';

class HourlyEmployee extends Employee {
    private $hoursWorked;
    private $rate;

    public function __construct($name, $address, $age, $companyName, $hoursWorked, $rate) {
        parent::__construct($name, $address, $age, $companyName);
        $this->hoursWorked = $hoursWorked;
        $this->rate = $rate;
    }

    public function earnings() {
        $overtimeRate = $this->hoursWorked > 40 ? 1.5 * $this->rate : $this->rate;
        return $this->hoursWorked * $overtimeRate;
    }

    public function __toString() {
        return parent::__toString() . ", Earnings: " . $this->earnings();
    }
}
?>

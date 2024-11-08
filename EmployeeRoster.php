<?php
class EmployeeRoster {
    private $roster;

    public function __construct($rosterSize) {
        $this->roster = array_fill(0, $rosterSize, null);
    }

    public function add($employee) {
        foreach ($this->roster as &$slot) {
            if ($slot === null) {
                $slot = $employee;
                return;
            }
        }
        echo "Roster is full!\n";
    }

    public function remove($index) {
        if (isset($this->roster[$index])) {
            $this->roster[$index] = null;
        }
    }

    public function count() {
        return count(array_filter($this->roster, fn($e) => $e !== null));
    }

    public function countCE() {
        return count(array_filter($this->roster, fn($e) => $e instanceof CommissionEmployee));
    }

    public function countHE() {
        return count(array_filter($this->roster, fn($e) => $e instanceof HourlyEmployee));
    }

    public function countPE() {
        return count(array_filter($this->roster, fn($e) => $e instanceof PieceWorker));
    }

    public function display() {
        foreach ($this->roster as $employee) {
            if ($employee !== null) {
                echo $employee . "\n";
            }
        }
    }

    public function payroll() {
        foreach ($this->roster as $employee) {
            if ($employee !== null) {
                echo $employee . ", Payroll: " . $employee->earnings() . "\n";
            }
        }
    }
}
?>

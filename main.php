<?php

require_once 'Person.php';
require_once 'Employee.php';
require_once 'CommissionEmployee.php';
require_once 'HourlyEmployee.php';
require_once 'PieceWorker.php';
require_once 'EmployeeRoster.php';

class Main {

    private EmployeeRoster $roster;
    private $size;
    private $repeat;

    public function start() {
        $this->clear();
        $this->repeat = true;

        $this->size = readline("Enter the size of the roster: ");

        if ($this->size < 1) {
            echo "Invalid input. Please try again.\n";
            readline("Press \"Enter\" key to continue...");
            $this->start();
        } else {
            $this->roster = new EmployeeRoster($this->size);
            $this->entrance();
        }
    }

    public function entrance() {
        $choice = 0;

        while ($this->repeat) {
            $this->clear();
            $this->menu();
            $choice = (int)readline("Select an option: ");

            switch ($choice) {
                case 1:
                $this->addMenu();
                    break;
                case 2:
                $this->deleteMenu();
                    break;
                case 3:
                $this->otherMenu();
                    break;
                case 0:
                $this->repeat = false;
                    break;
                default:
                    echo "Invalid input. Please try again.\n";
                    readline("Press \"Enter\" key to continue...");
                    $this->entrance();
                    break;
            }
        }
        echo "Process terminated.\n";
        exit;
    }

    public function menu() {
        echo "*** EMPLOYEE ROSTER MENU ***\n";
        echo "[1] Add Employee\n";
        echo "[2] Delete Employee\n";
        echo "[3] Other Menu\n";
        echo "[0] Exit\n";
    }

    public function addMenu() {
        $this->clear();
        echo "--- Add Employee ---\n";
        $name = readline("Enter name: ");
        $address = readline("Enter address: ");
        $age = readline("Enter age: ");
        $companyName = readline("Enter company name: ");
        $this->empType($name, $address, $age, $companyName);
    }

    public function empType($name, $address, $age, $cName) {
        $this->clear();
        echo "---Employee Details \n";
        echo "Enter name: $name\n";
        echo "Enter address: $address\n";
        echo "Enter company name: $cName\n";
        echo "Enter age: $age\n";
        echo "[1] Commission Employee       [2] Hourly Employee       [3] Piece Worker";
        $type = readline("Type of Employee: ");

        switch ($type) {
            case 1:
                $this->addOnsCE($name, $address, $age, $cName);
                break;
            case 2:
                $this->addOnsHE($name, $address, $age, $cName);
                break;
            case 3:
                $this->addOnsPE($name, $address, $age, $cName);
                break;
            default:
                echo "Invalid input. Please try again.\n";
                readline("Press \"Enter\" key to continue...");
                $this->empType($name, $address, $age, $cName);
                break;
        }
    }

    public function addOnsCE($name, $address, $age, $cName) {
        $regularSalary = (float)readline("Enter regular salary: ");
        $itemsSold = (int)readline("Enter number of items sold: ");
        $commissionRate = (float)readline("Enter commission rate: ");

        $this->roster->add(new CommissionEmployee($name, $address, $age, $cName, $regularSalary, $itemsSold, $commissionRate));
        $this->repeat();
    }

    public function addOnsHE($name, $address, $age, $cName) {
         $hoursWorked = (float)readline("Enter hours worked: ");
         $rate = (float)readline("Enter hourly rate: ");

         $this->roster->add(new HourlyEmployee($name, $address, $age, $cName, $hoursWorked, $rate));
         $this->repeat();
    }

    public function addOnsPE($name, $address, $age, $cName) {
        $piecesProduced = (int)readline("Enter number of pieces produced: ");
        $ratePerPiece = (float)readline("Enter rate per piece: ");

        $this->roster->add(new PieceWorker($name, $address, $age, $cName, $piecesProduced, $ratePerPiece));
        $this->repeat();
    }

    public function deleteMenu() {
        $this->clear();    
        echo "***List of Employees on the current Roster***\n";
        $this->roster->display(); 
        $id = readline("Enter the ID of the employee to delete (0 to return): ");
       
        if ($id === 0) {
            $this->entrance();
        } else {
            $this->roster->delete($id); 
            echo "Employee deleted.\n";
        readline("\nPress \"Enter\" key to continue...");
        $this->deleteMenu();
        }
    }

    public function otherMenu() {
        $this->clear();
        echo "[1] Display\n";
        echo "[2] Count\n";
        echo "[3] Payroll\n";
        echo "[0] Return\n";
        $choice = readline("Select Menu: ");

        switch ($choice) {
            case 1:
            $this->displayMenu();
                break;
            case 2:
            $this->countMenu();
                break;
            case 3:
            $this->roster->payroll(); 
            readline("Press \"Enter\" key to continue...");
            $this->otherMenu();
                break;
            case 0:
            $this->entrance();
                break;

            default:
                echo "Invalid input. Please try again.\n";
                readline("Press \"Enter\" key to continue...");
                $this->otherMenu();
                break;
        }
    }

    public function displayMenu() {
        $this->clear();
        echo "[1] Display All Employee\n";
        echo "[2] Display Commission Employee\n";
        echo "[3] Display Hourly Employee\n";
        echo "[4] Display Piece Worker\n";
        echo "[0] Return\n";
        $choice = readline("Select Menu: ");

        switch ($choice) {
            case 0:
            $this->entrance();
                break;
            case 1:
            $this->roster->display();
                break;
            case 2:
            $this->roster->displayCE();
                break;
            case 3:
            $this->roster->displayHE();
                break;
            case 4:
            $this->roster->displayPE();
                break;

            default:
                echo "Invalid Input!";
                break;
        }

        readline("\nPress \"Enter\" key to continue...");
        $this->displayMenu();
    }

    public function countMenu() {
        $this->clear();
        echo "[1] Count All Employee\n";
        echo "[2] Count Commission Employee\n";
        echo "[3] Count Hourly Employee\n";
        echo "[4] Count Piece Worker\n";
        echo "[0] Return\n";
        $choice = readline("Select Menu: ");

        switch ($choice) {
            case 0:
            $this->entrance();
                break;

            case 1:
             echo "Total Employees: " . $this->roster->count() . "\n";
                break;
            case 2:
            echo "Commission Employees: " . $this->roster->countCE() . "\n";
                break;
            case 3:
            echo "Hourly Employees: " . $this->roster->countHE() . "\n";
                break;
            case 4:
            echo "Piece Workers: " . $this->roster->countPE() . "\n";
                break;

            default:
                echo "Invalid Input!";
                break;
        }


        readline("\nPress \"Enter\" key to continue...");
        $this->countMenu();
    }

    public function clear() {
        system('clear');
    }

    public function repeat()
{
    echo "Employee Added!\n";

    
    if ($this->roster->count() >= $this->size) {
        echo "Roster is Full\n";
        readline("Press \"Enter\" key to continue...");
        $this->entrance();
        return;  
    }

    $c = readline("Add more? (y to continue): ");
    if (strtolower($c) == 'y') {
        $this->addMenu();
    } else {
        $this->entrance();
    }
}
}

$main = new Main();
$main->start();


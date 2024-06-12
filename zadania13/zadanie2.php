<?php

interface Employee {
    public function getSalary();
    public function setSalary($salary);
    public function getRole();
}

class Manager implements Employee {
    private $salary;
    private $employees = [];

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return "Manager";
    }

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function getEmployees() {
        return $this->employees;
    }
}

class Developer implements Employee {
    private $salary;
    private $programmingLanguage;

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return "Developer";
    }

    public function setProgrammingLanguage($programmingLanguage) {
        $this->programmingLanguage = $programmingLanguage;
    }

    public function getProgrammingLanguage() {
        return $this->programmingLanguage;
    }
}

class Designer implements Employee {
    private $salary;
    private $designingTool;

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return "Designer";
    }

    public function setDesigningTool($designingTool) {
        $this->designingTool = $designingTool;
    }

    public function getDesigningTool() {
        return $this->designingTool;
    }
}


$manager = new Manager();
$developer = new Developer();
$designer = new Designer();


$manager->setSalary(8000);
$developer->setSalary(6000);
$designer->setSalary(5000);


$developer->setProgrammingLanguage("PHP");
$designer->setDesigningTool("Adobe Photoshop");


$manager->addEmployee($developer);
$manager->addEmployee($designer);


echo "Manager Salary: " . $manager->getSalary() . "\n";
echo "Developer Salary: " . $developer->getSalary() . "\n";
echo "Designer Salary: " . $designer->getSalary() . "\n";

echo "Developer Programming Language: " . $developer->getProgrammingLanguage() . "\n";
echo "Designer Designing Tool: " . $designer->getDesigningTool() . "\n";

echo "Manager Role: " . $manager->getRole() . "\n";
echo "Developer Role: " . $developer->getRole() . "\n";
echo "Designer Role: " . $designer->getRole() . "\n";

echo "Employees under Manager:\n";
foreach ($manager->getEmployees() as $employee) {
    echo "- " . $employee->getRole() . "\n";
}
?>

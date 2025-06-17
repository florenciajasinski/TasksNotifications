<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\Domain\Actions;

use Lightit\Backoffice\Employee\Domain\DataTransferObject\EmployeeDto;
use Lightit\Backoffice\Employee\Domain\Models\Employee;

class StoreEmployeeAction
{
    public function execute(EmployeeDto $employeeDto): Employee
    {
        $employee = new Employee();

        $employee->name = $employeeDto->name;
        $employee->email = $employeeDto->email;

        $employee->save();
        return $employee;
    }
}

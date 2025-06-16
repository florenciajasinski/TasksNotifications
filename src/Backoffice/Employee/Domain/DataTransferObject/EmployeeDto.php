<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\Domain\DataTransferObject;

class EmployeeDto
{
    public string $name;

    public string $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}

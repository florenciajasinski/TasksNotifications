<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Employee\Domain\DataTransferObject\EmployeeDto;
use Lightit\Backoffice\Employee\Domain\Models\Employee;

class StoreEmployeeRequest extends FormRequest
{
    public const NAME = 'name';

    public const EMAIL = 'email';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME => ['required', 'string', 'min:4', 'max:80'],
            self::EMAIL => [
                'required',
                'max:100',
                Rule::email()
                    ->strict(),
                Rule::unique(Employee::class, 'email'),
            ],
        ];
    }

    public function toDto(): EmployeeDto
    {
        return new EmployeeDto(
            name: $this->string(self::NAME)->toString(),
            email: $this->string(self::EMAIL)->toString()
        );
    }
}

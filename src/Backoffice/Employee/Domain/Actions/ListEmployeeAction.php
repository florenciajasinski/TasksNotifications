<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\Domain\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Employee\Domain\Models\Employee;
use Spatie\QueryBuilder\QueryBuilder;

class ListEmployeeAction
{
    /**
     * @return LengthAwarePaginator<int, Model>
     */
    public function execute(): LengthAwarePaginator
    {
        return QueryBuilder::for(Employee::class)
            ->allowedFilters(['email'])
            ->allowedSorts('email')
            ->orderBy('id', 'desc')
            ->paginate();
    }
}

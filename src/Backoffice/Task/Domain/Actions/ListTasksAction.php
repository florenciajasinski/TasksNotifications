<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Task\Domain\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

class ListTasksAction
{
    /**
     * @return LengthAwarePaginator<int, Model>
     */
    public function execute(): LengthAwarePaginator
    {
        return QueryBuilder::for(Task::class)
            ->allowedFilters(['email'])
            ->allowedSorts('email')
            ->orderBy('id', 'desc')
            ->paginate();
    }
}

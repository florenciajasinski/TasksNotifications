<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Employee\Domain\Models\Task;

/**
 * @property int                          $id
 * @property string                       $name
 * @property string                       $email
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Lightit\Backoffice\Employee\Domain\Models\Task> $tasks
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Task> $tasks
 * @property-read int|null $tasks_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['name', 'email'];
}

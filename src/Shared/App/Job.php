<?php

declare(strict_types=1);

namespace Lightit\Shared\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int                          $id
 * @property string                       $title
 * @property string                       $location
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Database\Factories\JobFactory                    factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job whereUpdatedAt($value)
 * @property int $employer_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Job whereEmployerId($value)
 * @property-read \Lightit\Shared\App\Employer|null $employer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Lightit\Shared\App\Tag> $tags
 * @property-read int|null $tags_count
 * @mixin \Eloquent
 */
class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $guarded = [];

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}

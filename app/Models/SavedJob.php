<?php

namespace App\Models;

use Database\Factories\SavedJobFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property int $job_application_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read JobApplication $jobApplication
 *
 * @method static SavedJobFactory factory($count = null, $state = [])
 * @method static Builder<static>|SavedJob newModelQuery()
 * @method static Builder<static>|SavedJob newQuery()
 * @method static Builder<static>|SavedJob query()
 * @method static Builder<static>|SavedJob whereCreatedAt($value)
 * @method static Builder<static>|SavedJob whereDeletedAt($value)
 * @method static Builder<static>|SavedJob whereId($value)
 * @method static Builder<static>|SavedJob whereJobApplicationId($value)
 * @method static Builder<static>|SavedJob whereUpdatedAt($value)
 * @method static Builder<static>|SavedJob whereUserId($value)
 *
 * @mixin \Eloquent
 */
class SavedJob extends Model
{
    /** @use HasFactory<SavedJobFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_application_id',
    ];

    public function jobApplication(): BelongsTo
    {
        return $this->belongsTo(JobApplication::class);
    }
}

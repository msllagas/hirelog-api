<?php

namespace App\Models;

use Database\Factories\JobApplicationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $employment_type_id
 * @property string $company_name
 * @property string $position
 * @property string $location
 * @property string $description
 * @property string|null $application_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read JobType $employmentType
 * @property-read mixed $is_even
 *
 * @method static JobApplicationFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobApplication newModelQuery()
 * @method static Builder<static>|JobApplication newQuery()
 * @method static Builder<static>|JobApplication query()
 * @method static Builder<static>|JobApplication whereApplicationUrl($value)
 * @method static Builder<static>|JobApplication whereCompanyName($value)
 * @method static Builder<static>|JobApplication whereCreatedAt($value)
 * @method static Builder<static>|JobApplication whereDeletedAt($value)
 * @method static Builder<static>|JobApplication whereDescription($value)
 * @method static Builder<static>|JobApplication whereEmploymentTypeId($value)
 * @method static Builder<static>|JobApplication whereId($value)
 * @method static Builder<static>|JobApplication whereLocation($value)
 * @method static Builder<static>|JobApplication wherePosition($value)
 * @method static Builder<static>|JobApplication whereSalary($value)
 * @method static Builder<static>|JobApplication whereUpdatedAt($value)
 *
 * @property int $user_id
 *
 * @method static Builder<static>|JobApplication whereUserId($value)
 *
 * @property int $job_type_id
 * @property-read JobType $jobType
 *
 * @method static Builder<static>|JobApplication whereJobTypeId($value)
 *
 * @property int $application_status_id
 * @property-read ApplicationStatus $applicationStatus
 * @property-read bool $is_saved
 *
 * @method static Builder<static>|JobApplication onlyTrashed()
 * @method static Builder<static>|JobApplication whereApplicationStatusId($value)
 * @method static Builder<static>|JobApplication withTrashed()
 * @method static Builder<static>|JobApplication withoutTrashed()
 *
 * @property-read SavedJob|null $savedJob
 *
 * @mixin Eloquent
 */
class JobApplication extends Model
{
    /** @use HasFactory<JobApplicationFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_name',
        'job_type_id',
        'position',
        'location',
        'description',
        'application_url',
        'application_status_id',
        'applied_date',
    ];

    public function jobType(): BelongsTo
    {
        return $this->belongsTo(JobType::class);
    }

    public function applicationStatus(): BelongsTo
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    public function savedJob(): HasOne
    {
        return $this->hasOne(SavedJob::class)->where('user_id', Auth::id());
    }
}

<?php

namespace App\Models;

use Database\Factories\JobTypeFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name E.G., Full-Time, Part-Time, Contract, Freelance, Internship, Temporary
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static JobTypeFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobType newModelQuery()
 * @method static Builder<static>|JobType newQuery()
 * @method static Builder<static>|JobType query()
 * @method static Builder<static>|JobType whereCreatedAt($value)
 * @method static Builder<static>|JobType whereDeletedAt($value)
 * @method static Builder<static>|JobType whereId($value)
 * @method static Builder<static>|JobType whereName($value)
 * @method static Builder<static>|JobType whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class JobType extends Model
{
    /** @use HasFactory<JobTypeFactory> */
    use HasFactory;
}

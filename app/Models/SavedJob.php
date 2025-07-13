<?php

namespace App\Models;

use Database\Factories\SavedJobFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

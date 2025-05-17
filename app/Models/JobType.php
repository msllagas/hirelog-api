<?php

namespace App\Models;

use Database\Factories\JobTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    /** @use HasFactory<JobTypeFactory> */
    use HasFactory;
}

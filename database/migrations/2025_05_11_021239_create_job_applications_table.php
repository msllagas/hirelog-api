<?php

use App\Models\ApplicationStatus;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(JobType::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('company_name');
            $table->string('position');
            $table->string('location', 50)->nullable();
            $table->text('description')->nullable();
            $table->foreignIdFor(ApplicationStatus::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('application_url')->nullable();
            $table->date('applied_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};

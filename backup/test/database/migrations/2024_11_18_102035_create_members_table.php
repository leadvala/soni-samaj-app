<?php

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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('gotra');
            $table->string('marital_status');
            $table->string('dob');
            $table->string('address');
            $table->string('permanent_address');
            $table->string('aadhar');
            $table->string('photo');
            $table->string('qualifications');
            $table->string('gender');
            $table->string('blood_group');
            $table->string('house_type');
            $table->string('job_or_business');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

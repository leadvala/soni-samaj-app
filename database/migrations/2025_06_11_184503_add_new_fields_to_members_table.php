<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // Gotra Sections
            $table->string('gotra_self')->nullable();
            $table->string('gotra_mother')->nullable();
            $table->string('gotra_nani')->nullable();
            $table->string('gotra_dadi')->nullable();

            // Updated/Additional Fields
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();

            // Work Details
            $table->string('job_type')->nullable(); // private/government
            $table->string('designation')->nullable();
            $table->string('work_city')->nullable();

            // Religious Info
            $table->string('satimata_place')->nullable();
            $table->string('bheruji_place')->nullable();
            $table->string('kuldevi_place')->nullable();

            // Optional: You can rename old `gotra` to `gotra_self` and update values if required
            // $table->renameColumn('gotra', 'gotra_self'); // optional, if needed
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'gotra_self', 'gotra_mother', 'gotra_nani', 'gotra_dadi',
                'mobile', 'whatsapp',
                'job_type', 'designation', 'work_city',
                'satimata_place', 'bheruji_place', 'kuldevi_place'
            ]);
        });
    }
};

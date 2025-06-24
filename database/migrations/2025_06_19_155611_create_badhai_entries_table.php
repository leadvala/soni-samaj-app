<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('badhai_entries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('reason', 100); // like "Marriage", "Job", etc.
            $table->text('description')->nullable();
            $table->string('photo_path')->nullable();
            $table->date('date');
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('badhai_entries');
    }
};

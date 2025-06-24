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
    Schema::table('members', function (Blueprint $table) {
        $table->string('marital_status')
              ->nullable()
              ->default('Single')
              ->change();
    });
}

public function down(): void
{
    Schema::table('members', function (Blueprint $table) {
        $table->string('marital_status')
              ->nullable(false)
              ->default(null)
              ->change();
    });
}
};

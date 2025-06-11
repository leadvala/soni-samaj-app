<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('members', function (Blueprint $table) {
        $table->string('house_type')->nullable()->change();
    });
}

public function down()
{
    Schema::table('members', function (Blueprint $table) {
        $table->string('house_type')->nullable(false)->change();
    });
}

};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMembersTableFields extends Migration
{
    public function up(): void
{
    Schema::table('members', function (Blueprint $table) {
        if (! Schema::hasColumn('members', 'district')) {
            $table->string('district')->nullable()->after('permanent_address');
        }
        if (! Schema::hasColumn('members', 'area')) {
            $table->text('area')->nullable()->after('district');
        }
        if (! Schema::hasColumn('members', 'gotra')) {
            $table->string('gotra')->nullable()->after('gotra_dadi');
        }
        if (! Schema::hasColumn('members', 'business_name')) {
            $table->string('business_name')->nullable()->after('job_or_business');
        }
        if (! Schema::hasColumn('members', 'business_location')) {
            $table->string('business_location')->nullable()->after('business_name');
        }

        if (Schema::hasColumn('members', 'work_city') && !Schema::hasColumn('members', 'work_place')) {
            $table->renameColumn('work_city', 'work_place');
        }
    });
}


    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->renameColumn('work_place', 'work_city');
            $table->dropColumn([
                'district', 'area', 'gotra',
                'business_name', 'business_location'
            ]);
        });
    }
}

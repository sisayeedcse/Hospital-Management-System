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
        Schema::table('doctors', function (Blueprint $table) {
            // Add missing fields that are not present in the existing schema
            if (!Schema::hasColumn('doctors', 'dob')) {
                $table->date('dob')->nullable()->after('name');
            }
            if (!Schema::hasColumn('doctors', 'address')) {
                $table->text('address')->nullable()->after('email');
            }
            // Department column already exists based on the error, so skip it
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('doctors', 'dob')) {
                $columns[] = 'dob';
            }
            if (Schema::hasColumn('doctors', 'address')) {
                $columns[] = 'address';
            }
            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};

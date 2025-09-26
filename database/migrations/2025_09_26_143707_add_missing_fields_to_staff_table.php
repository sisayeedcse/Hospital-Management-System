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
        Schema::table('staff', function (Blueprint $table) {
            // Add missing fields for staff
            if (!Schema::hasColumn('staff', 'email')) {
                $table->string('email')->nullable()->after('name');
            }
            if (!Schema::hasColumn('staff', 'dob')) {
                $table->date('dob')->nullable()->after('email');
            }
            if (!Schema::hasColumn('staff', 'gender')) {
                $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('dob');
            }
            if (!Schema::hasColumn('staff', 'address')) {
                $table->text('address')->nullable()->after('gender');
            }
            
            // Add staff_role column instead of renaming (to avoid conflicts)
            if (!Schema::hasColumn('staff', 'staff_role')) {
                $table->string('staff_role')->nullable()->after('address');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('staff', 'email')) {
                $columns[] = 'email';
            }
            if (Schema::hasColumn('staff', 'dob')) {
                $columns[] = 'dob';
            }
            if (Schema::hasColumn('staff', 'gender')) {
                $columns[] = 'gender';
            }
            if (Schema::hasColumn('staff', 'address')) {
                $columns[] = 'address';
            }
            if (Schema::hasColumn('staff', 'staff_role')) {
                $columns[] = 'staff_role';
            }
            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};

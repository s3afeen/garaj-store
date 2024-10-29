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
    if (!Schema::hasColumn('users', 'is_admin')) {
        $table->boolean('is_admin')->default(0);
    }

    // Schema::table('users', function (Blueprint $table) {
    //     $table->boolean('is_admin')->default(0); // إضافة الحقل is_admin
    // });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('is_admin'); // إزالة الحقل is_admin
    });
}

};

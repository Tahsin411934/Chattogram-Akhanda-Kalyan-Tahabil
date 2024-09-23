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
            $table->string('mobile_number')->nullable();
        $table->string('email')->nullable();
        $table->date('date_of_birth')->nullable();
        $table->string('national_id_number')->nullable();
        $table->string('occupation')->nullable();
        $table->string('educational_qualification')->nullable();
        $table->string('akhanda_kalyan_tahabil')->nullable();
        $table->string('akhanda_mondoli_address')->nullable();
        $table->string('membership_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            //
        });
    }
};

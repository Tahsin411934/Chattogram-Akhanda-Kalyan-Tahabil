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
        $table->string('member_id')->unique();
        $table->string('member_name');
        $table->string('father_name');
        $table->string('mother_name');
        $table->string('spouse_name')->nullable();
        $table->text('permanent_address');
        $table->text('present_address');
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

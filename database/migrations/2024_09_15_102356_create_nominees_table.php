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
        Schema::create('nominees', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key for the nominees table
            $table->string('member_id'); // Foreign key reference
            $table->string('nominee_name');
            $table->integer('nominee_age');
            $table->text('nominee_address');
            $table->string('relation_with_member');
            $table->decimal('get_percentage', 5, 2); // Adjust precision and scale as needed
            $table->string('nominee_image')->nullable();
            $table->string('nominee_signature')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominees');
    }
};

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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // 'id' as primary key with auto-increment
            $table->unsignedBigInteger('user_id'); // Foreign key column
            $table->string('name');
            $table->string('address');
            $table->string('current_address');
            $table->string('subdistrict'); // Did you mean 'subdistrict'?
            $table->string('city'); // This will be a foreign key referencing the CSV data
            $table->string('province'); // This will be a foreign key referencing the CSV data
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->string('nationality');
            $table->date('birthday');
            $table->string('birth_city'); // This will be a foreign key referencing the CSV data
            $table->string('birth_province'); // This will be a foreign key referencing the CSV data
            $table->string('gender');
            $table->string('status');
            $table->string('religion');
            $table->string('image')->nullable();
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};


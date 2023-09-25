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
        Schema::create('borrow_histories', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('borrower_id'); // Foreign Key referencing Users Table
            $table->unsignedBigInteger('borrowed_book_id'); // Foreign Key referencing Books Table
            $table->timestamp('borrow_date')->useCurrent(); // Date when the book was borrowed
            $table->date('return_date')->nullable(); // Date when the book was returned
            $table->string('borrow_status'); // Status of the borrowing event

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_history');
    }
};

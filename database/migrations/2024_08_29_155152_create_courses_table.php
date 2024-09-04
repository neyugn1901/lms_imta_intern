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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_name', 255);
            $table->text('description');
            $table->unsignedBigInteger('category_id'); // Thêm cột khóa ngoại
            $table->enum('level', ['beginner', 'intermediate', 'advanced']);
            $table->string('image');
            $table->decimal('price', 8, 2);
            $table->timestamps();
            $table->string('video')->nullable();
            $table->string('file')->nullable();

            // Thêm ràng buộc khóa ngoại
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};


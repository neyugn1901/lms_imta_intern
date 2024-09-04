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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100)->nullable();
            $table->string('username', 50)->nullable();
            $table->string('image')->nullable();
            $table->string('phone', 20)->nullable();
            $table->datetime('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('user_agent')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->rememberToken();
            $table->timestamps();
            
            // Đặt khóa ngoại cho bảng users_categories
            $table->unsignedBigInteger('users_category_id')->nullable(); // Cho phép giá trị NULL nếu không có dữ liệu
            $table->foreign('users_category_id')->references('id')->on('users_categories')->onDelete('set null'); // Thay đổi hành động khi xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

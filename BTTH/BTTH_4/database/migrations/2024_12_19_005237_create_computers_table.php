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
        Schema::create('computers', function (Blueprint $table) {
            $table->id('id')->comment('Mã máy tính');
            $table->string('computer_name', 50)->comment('Tên máy tính');
            $table->string('model', 100)->comment('Tên phiên bản');
            $table->string('operating_system', 50)->comment('Hệ điều hành');
            $table->string('processor', 50)->comment('Bộ vi xử lý');
            $table->integer('memory')->comment('Bộ nhớ RAM');
            $table->boolean('available')->comment('Trạng thái hoạt động');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};

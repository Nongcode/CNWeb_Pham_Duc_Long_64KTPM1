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
        Schema::create('issues', function (Blueprint $table) {
            $table->id('id')->comment('Mã vấn đề báo cáo');
            $table->unsignedBigInteger('computer_id')->comment('Khóa ngoại tham chiếu computers.id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->string('reported_by', 50)->nullable()->comment('Người báo cáo sự cố (tùy chọn)');
            $table->dateTime('reported_date')->comment('Thời gian báo cáo');
            $table->text('description')->comment('Mô tả chi tiết vấn đề');
            $table->enum('urgency', ['Low', 'Medium', 'High'])->comment('Mức độ sự cố');
            $table->enum('status', ['Open', 'In Progress', 'Resolved'])->comment('Trạng thái hiện tại của sự cố (Mở, đang xử lý hoặc đã giải quyết)');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};

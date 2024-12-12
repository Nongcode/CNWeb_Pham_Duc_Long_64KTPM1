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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('brand',100)->nullable();
            $table->string('dosage',50);
            $table->string('form',50);
            $table->decimal('price',10,2);
            $table->integer('stock');
            $table->timestamps();
        });

        Schema::create('sales',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('medicine_id'); // khóa ngoại nối tới bảng medicines
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone',10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
        Schema::dropIfExists('medicines');
    }
};

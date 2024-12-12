<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('computer_name',50);
            $table->string('model',100);
            $table->string('operatin_system',50);
            $table->string('processor',50);
            $table->integer('memory');
            $table->tinyInteger('available');
            $table->timestamps();
        });
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->string('report_by',50);
            $table->dateTime('report_date');
            $table->string('description');
            $table->enum('urgency',['Low','Medium','High']);
            $table->enum('status',['Open','Inprogress','Resolved']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
        Schema::dropIfExists('computers');
    }
};

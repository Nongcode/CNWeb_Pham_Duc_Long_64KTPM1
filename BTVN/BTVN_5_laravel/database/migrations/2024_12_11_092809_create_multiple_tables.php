<?php

use Faker\Extension\BloodExtension;
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
        // Quản lý sách trong thư viện
        Schema::create('libraries', function (Blueprint $table) {
            $table->id(); // khóa chính của bảng libraries
            $table->string('name');
            $table->string('address');
            $table->string('contact_number');
            $table->timestamps();
        });

        Schema::create('books',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->year('publication_year');
            $table->string('genre');
            $table->unsignedBigInteger('library_id'); // khóa ngoại nối tới bảng libraries
            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
            $table->timestamps();
        });

        // Quản lý máy tính laptop cho thuê
        Schema::create('renters', function(Blueprint $table){
            $table->id(); // Khóa chính 
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('laptops', function(Blueprint $table){
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('specifications');
            $table->boolean('rental_status')->default(false);
            $table->unsignedBigInteger('renter_id')->nullable(); // ID người thuê có thể null nếu laptop đó ko có người thuê
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('cascade'); // ràng buộc khóa ngoại
            $table->timestamps();
        });

        // Quản lý thiết bị phần cứng trong trung tâm tin học
        Schema::create('it_centers', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('contact_email');
            $table->timestamps();
        }); 

        Schema::create('hardware_devices', function(Blueprint $table){
            $table->id();
            $table->string('device_name');
            $table->string('type');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('it_centers')->onDelete('cascade');
            $table->timestamps();
        });

        // Quản lý phim trong hệ thống rạp chiếu
        Schema::create('cinemas', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('total_seats');
            $table->timestamps();
        });

        Schema::create('movies', function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->date('release_date');
            $table->string('duration');
            $table->unsignedBigInteger('cinema_id');
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Quản lý sách trong thư viện
        Schema::dropIfExists('books');
        Schema::dropIfExists('libraries');

        // Quản lý laptop cho thuê
        Schema::dropIfExists('laptops');
        Schema::dropIfExists('renters');

        // Quản lý thiết bị phần cứng trong trung tâm tin học
        Schema::dropIfExists('hardware_devices');
        Schema::dropIfExists('it_centers');

        // Quản lý phim trong hệ thống rạp chiếu
        Schema::dropIfExists('movies');
        Schema::dropIfExists('cinemas');
    }
};

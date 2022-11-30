<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // new
            $table->string('image')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->enum('user_role',['superadmin','admin','employee','customer'])->default('customer'); 
            $table->unsignedBigInteger('category_id')->nullable();
                //categories table الي ب id لل data type لانه لازم يكون بنفس unsignedBigInteger() نوعه category حددنا انه 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                /**
                references('id') -> id in categories table
                on('categories') -> id الجدول الي متخذين منه 
                onDelete('cascade') -> fk بالجدول الاساسي بنحذف ال pk اذا انحذف ال
                */
            // new

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

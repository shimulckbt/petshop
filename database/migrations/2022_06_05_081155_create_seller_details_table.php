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
        Schema::create('seller_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('skill_type')->nullable();
            $table->string('ownership_type')->nullable();
            $table->integer('working_experience')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('picture_with_nid')->nullable();
            $table->text('adsress')->nullable();
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
        Schema::dropIfExists('seller_details');
    }
};

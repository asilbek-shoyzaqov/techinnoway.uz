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
        Schema::create('manages', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('image')->nullable();
            $table->string('profession_uz')->nullable();
            $table->string('profession_ru')->nullable();
            $table->string('profession_en')->nullable();
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('reception_time')->nullable();
            $table->string('address_uz')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('address_en')->nullable();
            $table->longtext('body_uz')->nullable();
            $table->longtext('body_ru')->nullable();
            $table->longtext('body_en')->nullable();
            $table->string('slug')->unique();
            $table->string('view_template')->default('default');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manages');
    }
};

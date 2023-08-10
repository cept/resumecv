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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nama_lengkap');            
            $table->string('email');
            $table->string('noHP');
            $table->string('headline');
            $table->string('alamat');
            $table->text('summary');
            $table->text('experience');
            $table->text('education');
            $table->text('skills');
            $table->text('certification');
            $table->string('url');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};

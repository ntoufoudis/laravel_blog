<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_meta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->text('bio')->nullable();
            $table->string('facebookProfile')->nullable();
            $table->string('instagramProfile')->nullable();
            $table->string('linkedinProfile')->nullable();
            $table->string('githubProfile')->nullable();
            $table->string('personalWebsite')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_meta');
    }
};

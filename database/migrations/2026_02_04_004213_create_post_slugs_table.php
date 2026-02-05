<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('post_slugs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('post_id')->constrained('user_posts');
            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_slugs');
    }
};

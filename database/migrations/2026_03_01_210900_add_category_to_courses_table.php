<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('category')->nullable()->after('description');
            $table->string('level')->nullable()->after('category');
            $table->integer('duration_hours')->nullable()->after('level');
            $table->enum('status', ['draft', 'published', 'archived'])->default('published')->after('duration_hours');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['category', 'level', 'duration_hours', 'status']);
        });
    }
};

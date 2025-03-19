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
         Schema::table('classes', function (Blueprint $table) {
            $table->foreignId('parallel_name_id')
                  ->nullable()
                  ->after('name')
                  ->constrained('parallel_names')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign(['parallel_name_id']);
            $table->dropColumn('parallel_name_id');
        });
    }
};

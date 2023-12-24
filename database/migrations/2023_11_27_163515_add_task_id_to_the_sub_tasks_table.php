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
        Schema::table('sub_taks', function (Blueprint $table) {
            $table->foreignId('task_id')->constrained('todos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_taks', function (Blueprint $table) {
            $table->dropForeign(['task_id']); // Drop the foreign key constraint
            $table->dropColumn('task_id'); // Drop the task_id column
        });
    }
};
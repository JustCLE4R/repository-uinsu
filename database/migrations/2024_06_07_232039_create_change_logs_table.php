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
        Schema::create('change_logs', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->unsignedBigInteger('archive_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('action',  ['accept', 'edit', 'reject', 'delete', 'permanent_delete', 'restore']);
            $table->jsonb('old_values')->nullable()->default(null);
            $table->jsonb('new_values')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_logs');
    }
};

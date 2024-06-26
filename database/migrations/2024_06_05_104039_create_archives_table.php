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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('type');
            $table->string('title');
            $table->string('abstract');
            $table->string('editor');
            $table->string('file');

            // Publication Details
            $table->string('penerbit');
            $table->string('tempat_terbit');
            $table->string('isbn_issn');
            $table->string('official_url');
            $table->date('date');
            $table->string('volume');
            $table->string('number');
            $table->string('page');
            $table->string('identification_number');
            $table->string('journal_name');

            $table->string('subjek');
            $table->string('nomor_klasifikasi');
            $table->string('fakultas');
            $table->string('program_studi');
            $table->enum('status', ['accepted', 'rejected', 'pending'])->default('pending');
            $table->string('reject_reason')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};

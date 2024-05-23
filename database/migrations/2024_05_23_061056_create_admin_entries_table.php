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
        Schema::create('admin_entries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['member', 'trainer']);
            $table->enum('action', ['edit', 'delete']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_entries');
    }
};

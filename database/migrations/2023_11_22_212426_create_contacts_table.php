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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable(false);
            $table->string('title', 100)->nullable(false);
            $table->string('email', 100)->unique()->nullable(false);
            $table->string('phone', 100)->unique()->nullable(false);
            $table->string('address', 100)->nullable(false);
            $table->text('profilePicture')->nullable(false);
            $table->timestamps();
            $table->foreignId('user_id')
                ->constrained(table: 'users', indexName: 'contacts_user_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

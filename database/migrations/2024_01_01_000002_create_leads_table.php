<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('contact'); // contact | consultation | demo | audit
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->string('source')->nullable();
            $table->string('status')->default('new'); // new | contacted | qualified | converted | closed
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->index(['status', 'type']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};

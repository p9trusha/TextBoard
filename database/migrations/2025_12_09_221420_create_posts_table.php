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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->timestamps();
            $table->unsignedBigInteger('parent');
            $table->string('parent_type');
            $table->unsignedBigInteger('reply_to')->nullable();

            $table->foreign('reply_to')->references('id')->on('posts')->onDelete('set null');

            $table->index(['parent', 'parent_TYPE']);
            $table->index('reply_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

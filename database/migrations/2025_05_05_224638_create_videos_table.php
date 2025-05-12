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
       Schema::create('videos', function (Blueprint $table) {
    $table->id();
    $table->string('titre');
    $table->text('description');
    $table->string('url');
     $table->string('video_file')->nullable();
    $table->string('youtube_id')->nullable();
    $table->unsignedBigInteger('categorie_id'); // Manuellement définir la colonne 'categorie_id' comme unsignedBigInteger
    $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
    $table->boolean('premium')->default(false);
    $table->timestamps();
});



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};

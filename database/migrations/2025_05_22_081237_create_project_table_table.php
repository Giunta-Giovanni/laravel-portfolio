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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);                           // nome del progetto
            $table->string('client', 100)->nullable();              // nome del cliente
            $table->date('start_date');                             // data di inizio
            $table->date('end_date')->nullable();                   // data di fine
            $table->enum('state', ['completed', 'in progress']);    // stato del progetto
            $table->text('description');                    // descrizione progetto

            // $table->string('slug', 120)->unique();           // breve presentazione progetto
            // $table->string('type', 50);                      // categoria (es. 'frontend', 'fullstack', ecc.)
            // $table->string('technologies', 150);             // tecnologie usate (es. Laravel, node.js, express, ecc.)
            // $table->string('project_url', 255)->nullable();  // link a GitHub o demo
            // $table->string('image', 255)->nullable();        // path o URL thumbnail
            // $table->string('video_path', 255)->nullable();   // path o URL thumbnail
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_table');
    }
};

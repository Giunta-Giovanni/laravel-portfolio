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
        Schema::table('projects', function (Blueprint $table) {

            //aggiungiamo la colonna e la constrained
            $table->foreignId('type_id')->default(1)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            //rimuoviamo la constraines
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }
};

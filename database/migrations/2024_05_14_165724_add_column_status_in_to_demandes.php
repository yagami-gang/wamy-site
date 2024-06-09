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
        Schema::table('demandes', function (Blueprint $table) { 
                // Ajout du champ 'statut' avec un type enum
                $table->enum('statut', ['en_attente', 'en_cours', 'resolu'])->default('en_attente');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
                // Suppression du champ 'statut' si nécessaire lors d'un rollback
                $table->dropColumn('statut');     
        });
    }
};

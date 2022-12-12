<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assure_secondaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("folder_id");
            $table->string("nom");
            $table->string("prenom");
            $table->string("date_naissance");
            $table->string("civilite");
            $table->string("numero_securire_sociale");
            $table->string("type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assure_secondaires');
    }
};

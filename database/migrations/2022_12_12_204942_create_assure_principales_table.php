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
        Schema::create('assure_principales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folder_id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('nom_jeune_fille')->nullable();
            $table->string('numero_telephone')->nullable();
            $table->string('numero_telephone_2')->nullable();
            $table->string('pays_naissance')->nullable();
            $table->string("date_naissance")->nullable();
            $table->string('departement_naissance')->nullable();
            $table->string('email')->nullable();
            $table->string('civilite')->nullable();
            $table->string('code_organisme')->nullable();
            $table->string('etat_civil')->nullable();
            $table->string('code_securite_social')->nullable();
            $table->string('iban')->nullable();
            $table->date('jour_prelevement')->nullable();
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
        Schema::dropIfExists('assure_principales');
    }
};
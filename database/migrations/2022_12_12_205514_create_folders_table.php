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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string("compagnie");
            $table->float("cotisation_ht");
            $table->float("cotisation_ttc");
            $table->date("date_effet");
            $table->string("souscripteur");
            $table->text("comment")->nullable();
            $table->string("status")->default("INCOMPLET");
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
        Schema::dropIfExists('folders');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('permissions');
            $table->string('description');
            $table->timestamps();
        });

        // insert default roles
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'permissions' => '*',
                'description' => 'Gerer toute l\'application',
            ],
            [
                'name' => 'View',
                'permissions' => 'viewer',
                'description' => 'Voir les dossier',
            ],
            [
                'name' => 'Edit',
                'permissions' => 'editor',
                'description' => 'Modifier les dossier',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraticiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praticiens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('nom', 30);
            $table->char('prenom', 30);
            $table->char('adresse', 30);
            $table->char('cp', 5);
            $table->char('ville', 30);
            $table->char('coeff', 5);
            $table->char('lieu', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('praticiens');
    }
}

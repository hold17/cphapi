<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('ip');
            $table->string('mac')->unique();
            $table->string('firemode')->default($value = 'safe'); // safe, semi, burst, auto
            $table->integer('connectionStrength'); // 0-4
            $table->integer('batteryLevel');
            $table->string('model')->nullable(); // type (Troels)
            $table->integer('propaneTime')->nullable(); // troels
            $table->integer('propaneLevel')->nullable(); // troels
            $table->integer('oxygenTime')->nullable(); // troels
            $table->integer('oxygenLevel')->nullable(); // troels
            $table->boolean('itemType')->default(true); // troels

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
        Schema::dropIfExists('weapons');
    }
}

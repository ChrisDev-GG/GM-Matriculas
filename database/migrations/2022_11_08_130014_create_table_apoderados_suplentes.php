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
        Schema::create('apoderados_suplentes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('run');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address', 100)->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('id_apoderado')->constrained('apoderados');
            $table->foreignId('id_user')->constrained('users');
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
        Schema::dropIfExists('apoderados_suplentes');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('service_id');
            $table->string('tajukPenyelenggaraan');
            $table->dateTime('mulaPenyelenggaraan');
            $table->dateTime('tamatPenyelenggaraan');
            $table->smallInteger('tersedia')->nullable();
            $table->text('kataAluan')->nullable();
            $table->text('kataAkhiran')->nullable();
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
        Schema::dropIfExists('maintenances');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('public_access');
            $table->boolean('is_repaired');
            $table->boolean('is_withdrawn');
            $table->bigInteger('repairman_id')->unsigned()->nullable();
        });

        Schema::table('devices', function ($table) {
            $table->foreign('repairman_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function ($table) {
            $table->dropForeign('devices_repairman_id_foreign');
        });
        Schema::dropIfExists('devices');
    }
}

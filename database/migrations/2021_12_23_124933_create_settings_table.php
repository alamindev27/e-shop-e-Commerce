<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('email');
            $table->string('store_location');
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->string('favicon');
            $table->text('footer_description');
            $table->string('office_location');
            $table->string('country');
            $table->string('city');
            $table->string('info_email');
            $table->string('info_number');
            $table->string('copyright_text');
            $table->string('copyright_link');
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
        Schema::dropIfExists('settings');
    }
}

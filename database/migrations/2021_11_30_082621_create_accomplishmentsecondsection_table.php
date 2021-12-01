<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomplishmentsecondsectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomplishmentsecondsection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading');
            $table->text('paragraph');
            $table->string('image');
            $table->string('fontawesome');
            $table->string('dates');
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
        Schema::dropIfExists('accomplishmentsecondsection');
    }
}

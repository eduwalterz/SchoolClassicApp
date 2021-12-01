<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomplishmentfirstsectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomplishmentfirstsection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading');
            $table->string('image');
            $table->text('paragraph');
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
        Schema::dropIfExists('accomplishmentfirstsection');
    }
}

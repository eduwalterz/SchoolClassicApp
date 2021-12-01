<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIctdepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ictdepartment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_heading');
            $table->string('image');
            $table->string('sub_heading');
            $table->text('paragraph');
            $table->string('persona');
            $table->string('persona_title');
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
        Schema::dropIfExists('ictdepartment');
    }
}

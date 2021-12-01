<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancedepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financedepartment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_heading');
            $table->string('image')->nullable();
            $table->string('sub_heading');
            $table->text('paragraph');
            $table->string('author');
            $table->string('author_title');
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
        Schema::dropIfExists('financedepartment');
    }
}

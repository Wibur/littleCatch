<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstellationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('constellation')) {
            Schema::create('constellation', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->date('today_date');
                $table->string('constellation_name');
                $table->string('overall_fortune');
                $table->string('overall_description');
                $table->string('love_fortune');
                $table->string('love_description');
                $table->string('work_fortune');
                $table->string('work_description');
                $table->string('future_fortune');
                $table->string('future_description');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constellation');
    }
}

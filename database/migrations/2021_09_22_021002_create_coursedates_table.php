<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursedatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursedates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date	('scheduled_date');
            $table->integer	('max_attendee')->default(10);
            $table->string ('venue') ->default("18 Glenda Drive, Frankton, Queenstown");
            $table->boolean('isActive')->default(true);
            $table->foreignID ('course_id')->contrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursedates');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignID ('course_id')->contrained();
            $table->foreignID ('coursedate_id')->contrained();
            $table->integer('course_total');
            $table->string	('first_name');
            $table->string ('last_name');
            $table->string ('phone');
            $table->string ('email');
            $table->date ('dob');
            $table->string ('gender');
            $table->string	('company_name') ->nullable();
            $table->string ('street') ->nullable();
            $table->string ('suburb') ->nullable();
            $table->string ('city') ->nullable();
            $table->string	('postcode') ->nullable();
            $table->string ('country') ->nullable();
            $table->boolean('is_terms_agreed');
            $table->boolean('isActive')->default(true);

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
        Schema::dropIfExists('bookings');
    }
}

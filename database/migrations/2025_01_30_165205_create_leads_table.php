<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('location');
            $table->enum('property_type', ['House', 'Apartment', 'Condo']);
            $table->string('budget_from');
            $table->string('budget_to');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->date('move_in_date');
            $table->enum('interest_level', ['High', 'Medium', 'Low']);
            $table->string('heard_about')->nullable();
            $table->text('language')->nullable();
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
        Schema::dropIfExists('leads');
    }
}

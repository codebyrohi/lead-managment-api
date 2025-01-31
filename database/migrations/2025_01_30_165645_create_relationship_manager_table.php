<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationship_manager', function (Blueprint $table) {
            $table->integer('rm_id')->primary();
            $table->string('name', 100);
            $table->integer('years_of_experience');
            $table->decimal('client_feedback_score', 3, 2);
            $table->text('top_3_feedback_keywords');
            $table->integer('client_requests_for_same_rm');
            $table->decimal('response_time', 3, 2);
            $table->text('skills');
            $table->decimal('avg_sale_ticket_size', 10, 2);
            $table->string('language', 255);
            $table->string('locality', 100);
            $table->integer('properties_managed');
            $table->string('availability', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationship_manager');
    }
}

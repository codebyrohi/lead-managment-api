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
            $table->uuid('id')->primary();
            $table->uuid('assigned_rm_id')->nullable();
            $table->integer('min_budget')->nullable();
            $table->integer('max_budget')->nullable();
            $table->decimal('conversion_probability', 5, 2)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('email', 255)->nullable();
            $table->json('interaction_history')->nullable();
            $table->timestamp('last_contact_date')->useCurrent();
            $table->string('name', 255);
            $table->string('phone', 20)->nullable();
            $table->json('preferences')->nullable();
            $table->string('sentiment', 50)->nullable();
            $table->string('source', 255)->nullable();
            $table->string('status', 50)->nullable();
            $table->json('amenities')->nullable();
            $table->string('industry')->nullable();
            $table->string('location')->nullable();
            $table->string('property_type')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->text('additional_preferences')->nullable();
            $table->boolean('visit_scheduled')->nullable();
            $table->timestamp('last_visit_date')->useCurrent();
            $table->timestamp('rm_assigned_at')->useCurrent();
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

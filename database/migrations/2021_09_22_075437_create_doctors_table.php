<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->string('doc_specialist')->nullable();;
            $table->string('cli_name')->nullable();;
            $table->string('doc_service')->nullable();;
            $table->string('doc_career')->nullable();;
            // $table->string('doc_address1')->nullable();;
            // $table->string('doc_address2')->nullable();;
            // $table->string('doc_address3')->nullable();;
            // $table->string('doc_address4')->nullable();;
            // $table->string('doc_postcode')->nullable();;
            // $table->string('doc_state')->nullable();;
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->time('start_rest_time')->nullable();
            $table->time('end_rest_time')->nullable();
            $table->integer('slot_duration')->nullable();
            $table->string('working_day')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}

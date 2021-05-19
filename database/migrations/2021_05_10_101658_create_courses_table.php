<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) { 
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('schools_id');
            $table->integer('duration');
            $table->unsignedBigInteger('examinations_id');
            $table->string('status')->default(0);
            $table->longText('desc')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade') 
                  ->onDelete('cascade');
            $table->foreign('examinations_id')
                  ->references('id')
                  ->on('examinations')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('schools_id')
                  ->references('id')
                  ->on('schools')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); 
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
        Schema::dropIfExists('courses');
    }
}

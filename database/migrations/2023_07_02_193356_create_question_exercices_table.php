<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_exercices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_cours_id')->constrained('question_cours');
            $table->foreignId('exercice_id')->constrained('exercices');
            $table->integer('point')->nullable();
            $table->integer('duree')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_exercices');
    }
}

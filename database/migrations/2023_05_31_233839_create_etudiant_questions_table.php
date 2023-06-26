<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->nullable()->constrained('etudiants');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('dump_id')->constrained('dumps');
            $table->foreignId('option_id')->constrained('options');
            $table->foreignId('dump_user_id')->constrained('dump_users');
            $table->boolean('trouve');
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
        Schema::dropIfExists('etudiant_questions');
    }
}

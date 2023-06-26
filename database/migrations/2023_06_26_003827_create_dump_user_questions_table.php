<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDumpUserQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_user_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('dump_id')->constrained('dumps');
            $table->foreignId('dump_user_id')->constrained('dump_users');
            $table->foreignId('certification_id')->constrained('certifications');
            $table->boolean('trouve')->nullable();
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
        Schema::dropIfExists('dump_user_questions');
    }
}

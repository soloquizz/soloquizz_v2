<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDumpUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->nullable()->constrained('etudiants');
            $table->foreignId('dump_id')->constrained('dumps');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('certification_id')->constrained('certifications');
            $table->boolean('etat');
            $table->integer('score')->nullable();
            $table->integer('question_true')->nullable();
            $table->integer('question_false')->nullable();
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
        Schema::dropIfExists('dump_users');
    }
}

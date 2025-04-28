<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('party_go_auths', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('auth_token')->unique()->nullable();
            $table->timestamps();
        });

        Schema::create('party_go_user_exp', function (Blueprint $table) {
            $table->string('student_id')->primary();
            $table->integer('point')->default(0);
            $table->float('experience')->default(0);
            $table->integer('fame')->default(0);
            $table->integer('level')->default(0);
            $table->string('rank')->default('不穩定的工程師Lv.9');
            $table->timestamps();
        });

        Schema::create('party_go_questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('difficulty');
            $table->string('language');
            $table->text('content');
            $table->string('type');
            $table->text('answer_content');
            $table->string('answer');
            $table->timestamps();
        });

        Schema::create('party_go_question_sets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('difficulty');
            $table->string('language');
            $table->string('experience');
            $table->timestamps();
        });

        Schema::create('party_go_questions_and_question_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questions_id');
            $table->unsignedBigInteger('question_sets_id');
            $table->timestamps();
        });

        Schema::create('party_go_missions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mission_description');
            $table->unsignedBigInteger('question_set_id');
            $table->integer('difficulty');
            $table->string('grading_method');
            $table->dateTime('start_time');
            $table->dateTime('finish_time');
            $table->timestamps();
        });

        Schema::create('party_go_cases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('need_exp');
            $table->integer('point_reward');
            $table->integer('experience_reward');
            $table->integer('fame_reward');
            $table->integer('point_penalty');
            $table->integer('partial_experience_reward');
            $table->integer('fame_penalty');
            $table->timestamps();
        });

        Schema::create('party_go_mission_reward', function (Blueprint $table) {
            $table->id();
            $table->string('mission_id')->unique();
            $table->integer('point_reward');
            $table->integer('experience_reward');
            $table->integer('fame_reward');
            $table->timestamps();
        });

        Schema::create('party_go_mission_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mission_sets');
        Schema::dropIfExists('mission_reward');
        Schema::dropIfExists('cases');
        Schema::dropIfExists('missions');
        Schema::dropIfExists('questions_and_question_sets');
        Schema::dropIfExists('question_sets');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('user_exp');
        Schema::dropIfExists('auths');
    }
};

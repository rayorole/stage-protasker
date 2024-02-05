<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('banner_image')->nullable();
            $table->date('deadline')->nullable();
            $table->enum('type', ['design', 'marketing', 'development', 'testing', 'done']);
            $table->enum('status', ['done', 'in_progress', 'todo']);
            $table->text('description');
            $table->timestamps();

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('function');
            $table->foreignId('project_id');
            $table->foreignId('user_id');

            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('deadline');
            $table->text('description');
            $table->foreignId('assigned_to')->nullable();
            $table->timestamps();

            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('project_members')->onDelete('cascade');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->foreignId('task_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('user_id')->references('id')->on('users');
        });

        
       

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('project_member');
    }
};

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
        Schema::create('satisfactions', function (Blueprint $table) {

            # criando colunas da tabela
            $table->id();
            $table->uuid('token')->unique(); # token unico para cada formulario
            $table->string('migration_id')->unique(); # id da migracao associada ao formulario
            $table->string('system_name');
            $table->string('usuclin');

            # campos do formulario de satisfacao que serao preenchidos ou nao
            $table->tinyInteger('data_integrity')->nullable();
            $table->tinyInteger('delivery_time')->nullable();
            $table->tinyInteger('communication')->nullable();
            $table->tinyInteger('overall_satisfaction')->nullable();
            $table->boolean('data_loss')->nullable();
            $table->text('comments')->nullable();
            $table->timestamp('submitted_at')->nullable(); # usado para registrar se o formulario foi respondido
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satisfactions');
    }
};

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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->enum('document_type', [
                'Cédula de ciudadanía',
                'Tarjeta de identidad',
                'Cédula de extranjería',
                'Pasaporte',
                'Documento nacional de identidad',
                'Registro civil'
            ]);
            $table->unsignedBigInteger('document_number')->unique();
            $table->date('date_of_issue')->nullable();
            $table->string('first_name');
            $table->string('first_last_name');
            $table->string('second_last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', [
                'No registra',
                'Masculino',
                'Femenino'
            ])->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('telephone1')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};

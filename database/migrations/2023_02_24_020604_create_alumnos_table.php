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
        Schema::create('alumnos', function (Blueprint $table) {
            // lo basico para registrar de alumnos.
            $table->id();
            $table->string("nombre", 50);
            $table->string('apellido', 50);
            $table->integer('edad');
            $table->decimal('cuota');
            $table->string("correo", 50);

            // para el curso
            $table->foreignId("curso_id")->constrained("cursos")->onUpdate("cascade")->onDelete("restrict");

            // para la clasificacion del curso.
            $table->foreignId("curso_clasificacion_id")->constrained("curso_clasificacions")->onUpdate("cascade")->onDelete("restrict");

            // para la clasificacion del padre o tutor.
            $table->foreignId("padre_tutor_id")->constrained("curso_clasificacions")->onUpdate("cascade")->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('gender');
        $table->date('date_of_birth');
        $table->string('program');
        $table->decimal('gpa', 3, 2);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('students');
}
};

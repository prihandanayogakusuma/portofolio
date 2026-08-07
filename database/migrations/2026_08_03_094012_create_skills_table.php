<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
{
    Schema::create('skills', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('proficiency_percentage')->default(0);
        $table->string('category')->nullable();
        $table->text('icon')->nullable();
        $table->timestamps();
    });
}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->string('author'); 
            $table->string('publisher'); 
            $table->year('publication_year');
            $table->string('isbn')->unique(); 
            $table->integer('pages'); 
            $table->string('language'); 
            $table->text('description')->nullable(); 
            $table->decimal('price', 8, 2); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

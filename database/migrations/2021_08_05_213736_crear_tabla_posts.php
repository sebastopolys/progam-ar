<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table){
            $table->id();
            $table->string('type',25)->nullable();
            $table->string('titulo',150);
            $table->string('slug',150);
            $table->string('descripcion',500);
            $table->text('contenido'); 
            $table->bigInteger('auth_id');  
            $table->string('img_route');    
            $table->string('tags');        
            $table->boolean('estado')->default('1');
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
        Schema::dropIfExists('posts');
    }
}

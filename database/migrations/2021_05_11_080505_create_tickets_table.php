<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
   
    public function up()
    {
        
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('type_id');
            $table->string('name');
            $table->text('text');
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('contact_id')
                ->references('id')->on('contacts')
                ->onDelete('cascade');
            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

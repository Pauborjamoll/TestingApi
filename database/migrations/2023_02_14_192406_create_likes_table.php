<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Mis tablas
            $table->enum('value',['1','-1', null])->default(null);

            //Foreign Keys
            $table->foreignId('post_id')
                ->onDelete('cascade')
                ->nullable()
                ->constraint();
            
            $table->foreignId('user_id')
                ->onDelete('SET NULL')
                ->nullable()
                ->constraint();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};

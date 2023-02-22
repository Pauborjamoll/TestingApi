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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Mis tablas
            $table->text('title');
            $table->string('slug');
            $table->longText('body');

            //Foregin Keys
            $table->foreignId('community_id')
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
        Schema::dropIfExists('posts');
    }
};

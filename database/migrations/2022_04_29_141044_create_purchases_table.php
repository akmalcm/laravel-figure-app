<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('figure_id');
            $table->string('firstName', 60);
            $table->string('lastName', 60);
            $table->string('phone', 15);
            $table->string('address', 100);
            $table->string('postcode', 7);
            $table->string('city', 30);
            $table->string('state', 30);
            $table->timestamps();

            $table->foreign('buyer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            
            $table->foreign('figure_id')
                ->references('id')->on('figures')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('purchases');
    }
};

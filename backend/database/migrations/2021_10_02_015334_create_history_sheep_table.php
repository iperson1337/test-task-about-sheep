<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorySheepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_sheep', function (Blueprint $table) {
            $table->foreignId('history_id')
                ->constrained('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sheep_id')
                ->constrained('sheep')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['history_id', 'sheep_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_sheep');
    }
}

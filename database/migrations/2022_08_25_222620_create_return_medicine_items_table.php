<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnMedicineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_medicine_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('return_medicine_id')->nullable();
            $table->bigInteger('medicine_id')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('quantity')->nullable();
            $table->decimal('total')->nullable();
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
        Schema::dropIfExists('return_medicine_items');
    }
}

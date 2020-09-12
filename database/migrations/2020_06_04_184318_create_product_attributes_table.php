<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained('products', 'id')
                ->onUpdate('cascade');

            $table->foreignId('section_id')->constrained('sections', 'id')
                ->onUpdate('cascade');

            $table->foreignId('attribute_id')->constrained('attributes', 'id')
                ->onUpdate('cascade');

            $table->text('value');

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
        Schema::dropIfExists('product_attributes');
    }
}

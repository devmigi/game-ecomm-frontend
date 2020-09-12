<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable(); // overridden value

            $table->foreignId('product_id')->nullable()->constrained('products', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('section_id')->nullable()->constrained('sections', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('priority')->unsigned(); // will be used for ordering
            $table->boolean('active');

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
        Schema::dropIfExists('product_sections');
    }
}

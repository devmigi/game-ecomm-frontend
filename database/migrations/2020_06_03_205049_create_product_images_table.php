<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained('products', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('image_id')->nullable()->constrained('files', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->string('type',33); // cover, preview, etc
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
        Schema::dropIfExists('product_images');
    }
}

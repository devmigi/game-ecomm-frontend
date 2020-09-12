<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained('products', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('user_id')->constrained('users', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->tinyInteger('rating');
            $table->string('title')->nullable();
            $table->text('comment')->nullable();

            $table->boolean('verified')->default(false);
            $table->boolean('deleted')->default(false);

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
        Schema::dropIfExists('reviews');
    }
}

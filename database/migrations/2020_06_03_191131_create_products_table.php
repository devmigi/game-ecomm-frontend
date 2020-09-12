<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku',111)->unique();

            $table->integer('rating')->unsigned()->nullable();
            $table->text('details')->nullable();
            $table->text('keywords')->nullable();

            $table->foreignId('parent_id')->nullable()->constrained('products', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('version_id')->nullable()->constrained('versions', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->double('cost_price',8,2)->nullable();
            $table->double('mrp',8,2);

            $table->double('trading_price',8,2);
            $table->double('trading_price_cap',8,2)->default(0);

            $table->double('selling_price',8,2)->default(0);
            $table->double('selling_price_cap',8,2)->default(0);

            $table->integer('length')->unsigned()->nullable();
            $table->integer('width')->unsigned()->nullable();
            $table->integer('height')->unsigned()->nullable();

            $table->integer('weight')->unsigned()->nullable();

            $table->integer('inventory');
            $table->integer('inventory_cap')->unsigned()->nullable();

            $table->dateTime('available_from');

            $table->boolean('active')->default(false);

            $table->foreignId('created_by')->nullable()->constrained('users', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('updated_by')->nullable()->constrained('users', 'id')
                ->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('products');
    }
}

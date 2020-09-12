<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageSectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_section_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_section_id')->constrained('page_sections', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('item_type', 55); // product, category
            $table->bigInteger('item_id');
            $table->integer('priority')->unsigned()->default(0);

            $table->foreignId('image_id')->nullable()->constrained('files', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->boolean('active')->default(false);

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
        Schema::dropIfExists('page_section_items');
    }
}

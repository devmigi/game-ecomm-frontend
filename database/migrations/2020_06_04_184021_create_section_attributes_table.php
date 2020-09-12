<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_attributes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('attribute_id')->constrained('attributes', 'id')
                ->onUpdate('cascade');

            $table->foreignId('image_id')->nullable()->constrained('files', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('section_id')->constrained('sections', 'id')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('section_attributes');
    }
}

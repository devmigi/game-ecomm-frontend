<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();

            $table->string('name',55);
            $table->enum('content_type', ['text', 'json', 'array', 'image', 'video', 'pdf', 'link', 'file']);
            $table->text('details')->nullable();

            $table->boolean('active');

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
        Schema::dropIfExists('attributes');
    }
}

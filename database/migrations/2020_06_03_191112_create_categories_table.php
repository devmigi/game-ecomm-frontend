<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('details')->nullable();
            $table->text('keywords')->nullable(); //comma seperated

            $table->foreignId('image_id')->nullable()->constrained('files', 'id')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('parent_id')->nullable()->constrained('categories', 'id')
                ->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('categories');
    }
}

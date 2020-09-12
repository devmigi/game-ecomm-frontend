<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('name', 55);
            $table->string('label', 22); //home, work, etc
            $table->string('mobile', 15)->nullable();

            $table->text('address');
            $table->string('landmark')->nullable();
            $table->decimal('latitude', 12, 8)->nullable();
            $table->decimal('longitude', 12, 8)->nullable();

            $table->foreignId('pincode_id')->constrained('pincodes', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('city_id')->constrained('pincodes', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('addresses');
    }
}

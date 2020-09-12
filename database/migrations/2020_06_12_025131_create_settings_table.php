<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name',55);
            $table->string('type',22)->default('text'); // text, radio/select, checkbox
            $table->text('options')->nullable();
            $table->string('value'); // selected value

            $table->foreignId('setting_group_id')->constrained('setting_groups', 'id')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('settings');
    }
}

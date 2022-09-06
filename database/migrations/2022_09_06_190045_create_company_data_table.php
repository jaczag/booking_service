<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->index();
            $table->string('phone', 20)->index();
            $table->string('email',50)->index();
            $table->string('tax_id_number', 20)->index();
            $table->time('open_from');
            $table->time('open_to');
            $table->boolean('weekend_contact')->default(false);
            $table->string('postal_code', 10);
            $table->string('city', 50);
            $table->string('street', 50)->nullable();
            $table->string('house_number', 10);
            $table->string('apartment_number')->nullable();
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
        Schema::dropIfExists('company_data');
    }
};

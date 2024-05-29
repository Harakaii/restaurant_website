<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('delivery_boys', function (Blueprint $table) {
            $table->bigIncrements('delevery_boy_id');
            $table->string('delevery_boy_name');
            $table->string('delevery_boy_phone_number')->unique();
            $table->string('delevery_boy_password');
            $table->integer('delevery_boy_status');
            $table->datetime('added_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_boys');
    }
};

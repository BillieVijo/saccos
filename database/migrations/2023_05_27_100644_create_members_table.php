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
        Schema::create('members', function (Blueprint $table) {
            $table->id();   
            $table->foreignId('user_id')->constrained('users');         
            $table->string('member_number');
            $table->string('address');
            $table->string('share')->default('0');
            $table->string('registered_year'); 
            $table->decimal('loan_amount',25,2)->default(0.00);
            $table->decimal('balance_amount',25,2)->default(0.00); 
            $table->decimal('deposit_amount',25,2)->default(0.00);
            $table->decimal('frozen_amount',25,2)->default(0.00);
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
        Schema::dropIfExists('members');
    }
};

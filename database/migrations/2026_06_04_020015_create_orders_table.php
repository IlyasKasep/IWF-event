<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();

            $table->string('name');
            $table->string('email');
            $table->string('phone');

            $table->integer('quantity')->default(1);
            $table->integer('ticket_price')->default(35000);
            $table->integer('total_amount')->default(35000);

            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed',
                'expired'
            ])->default('pending');

            $table->string('ticket_code')->nullable()->unique();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
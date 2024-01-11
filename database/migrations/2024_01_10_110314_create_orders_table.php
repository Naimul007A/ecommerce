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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->unsignedInteger ("user_id");
            $table->boolean ("phoneticized")->default (false);
            $table->decimal ("total_amount",14,2);
            $table->enum ("payment_method",['credit_card', 'debit_card', 'paypal', 'other']);
            $table->string ("payment_transaction_id",255)->nullable ();
            $table->enum ("status",['pending', 'approved', 'delivered', 'cancelled'])->default ("pending");
            $table->dateTime ("order_date")->default (\Illuminate\Support\Carbon::now ());
            $table->timestamps();
            $table->foreign ("user_id")->references ("id")->on ("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

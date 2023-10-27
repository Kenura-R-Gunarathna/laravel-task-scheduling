<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Post;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_type', ['membership', 'ad-promotion']);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Post::class);
            $table->decimal('amount', 10, 2);
            $table->string('description');
            $table->enum('payment_status', ['pending', 'success', 'declined', 'canceled']);
            $table->dateTime('payment_started_datetime')->comment('Payment is 1st started this date-time.');
            $table->dateTime('payment_valid_untill_datetime')->nullable()->comment('Payment is valid untill this date-time');
            $table->dateTime('payment_due_datetime')->nullable()->comment('Payment should be given before this date-time. Or else the membership or ad-promotions will be canceled.');
            $table->boolean('active')->default(0)->comment('States whether the payment is for recent, currently working membership or ad-promotion. 1:active, 0:expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

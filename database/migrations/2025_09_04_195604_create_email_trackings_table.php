<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\EmailStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('email_trackings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();

            $table->string('email', 150);
            $table->string('type', 50);
            $table->enum('status', EmailStatus::cases())->default(EmailStatus::Pending);
            $table->json('meta')->nullable();
            
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('email_trackings');
    }
};

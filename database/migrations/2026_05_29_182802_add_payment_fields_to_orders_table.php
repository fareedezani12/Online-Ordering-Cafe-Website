<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function ($table) {

            $table->string('payment_method')
                ->nullable();

            $table->string('payment_status')
                ->default('unpaid');

            $table->string('payment_reference')
                ->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('orders', function ($table) {

            $table->dropColumn([
                'payment_method',
                'payment_status',
                'payment_reference',
            ]);

        });
    }
};

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('logicalcrow.tables.plan_subscription_usage'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plan_subscription_feature_id')->unique();
            $table->unsignedInteger('used');
            $table->timestamp('valid_until')->nullable();
            $table->timestamps();

            $table->foreign('plan_subscription_feature_id')->references('id')->on(config('logicalcrow.tables.plan_subscription_features'))
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('logicalcrow.tables.plan_subscription_usage'));
    }
};

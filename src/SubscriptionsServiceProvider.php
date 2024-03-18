<?php

declare(strict_types=1);

namespace Logicalcrow\Subscriptions;

use Illuminate\Support\ServiceProvider;

class SubscriptionsServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishConfig();
        $this->publishMigrations();
    }

    /**
     * Publish package config.
     *
     * @return void
     */
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('lc_subscription.php')
        ], 'lc_subscription.config');
    }


    /**
     * Publish package migrations.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__ . './../database/create_plans_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_plans_table.php'),
            __DIR__ . '/../database/create_plan_features_table.php' => database_path('migrations/' . date('Y_m_d_His', time() + 1) . '_create_plan_features_table.php'),
            __DIR__ . '/../database/create_plan_subscriptions_table.php' => database_path('migrations/' . date('Y_m_d_His', time() + 2) . '_create_plan_subscriptions_table.php'),
            __DIR__ . '/../database/create_plan_subscription_features_table.php' => database_path('migrations/' . date('Y_m_d_His', time() + 3) . '_create_plan_subscription_features_table.php'),
            __DIR__ . '/../database/create_plan_subscription_usage_table.php' => database_path('migrations/' . date('Y_m_d_His', time() + 4) . '_create_plan_subscription_usage_table.php'),
            __DIR__ . '/../database/create_plan_subscription_schedules_table.php' => database_path('migrations/' . date('Y_m_d_His', time() + 5) . '_create_plan_subscription_schedules_table.php'),
            __DIR__ . '/../database/create_plan_combinations_table.php' => database_path('migrations/' . date('Y_m_d_His', time() + 6) . '_create_plan_combinations_table.php'),
            __DIR__ . '/../database/alter_plan_combinations_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_alter_plan_combinations_table.php')
        ], 'lc_subscription.migrations');
    }

}

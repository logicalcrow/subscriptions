<?php

declare(strict_types=1);

return [
    'main_subscription_tag' => 'main',
    'fallback_plan_tag' => null,
    // Database Tables
    'tables' => [
        'plans' => 'plans',
        'plan_combinations' => 'plan_combinations',
        'plan_features' => 'plan_features',
        'plan_subscriptions' => 'plan_subscriptions',
        'plan_subscription_features' => 'plan_subscription_features',
        'plan_subscription_schedules' => 'plan_subscription_schedules',
        'plan_subscription_usage' => 'plan_subscription_usage',
    ],

    // Models
    'models' => [
        'plan' => \Logicalcrow\Subscriptions\Models\Plan::class,
        'plan_combination' => \Logicalcrow\Subscriptions\Models\PlanCombination::class,
        'plan_feature' => \Logicalcrow\Subscriptions\Models\PlanFeature::class,
        'plan_subscription' => \Logicalcrow\Subscriptions\Models\PlanSubscription::class,
        'plan_subscription_feature' => \Logicalcrow\Subscriptions\Models\PlanSubscriptionFeature::class,
        'plan_subscription_schedule' => \Logicalcrow\Subscriptions\Models\PlanSubscriptionSchedule::class,
        'plan_subscription_usage' => \Logicalcrow\Subscriptions\Models\PlanSubscriptionUsage::class,
    ],

    'services' => [
        'payment_methods' => [
            'free' => \Logicalcrow\Subscriptions\Services\PaymentMethods\Free::class
        ]
    ]
];

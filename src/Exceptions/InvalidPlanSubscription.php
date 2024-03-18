<?php

namespace Logicalcrow\Subscriptions\Exceptions;

class InvalidPlanSubscription extends SubscriptionsException
{
    public function __construct($subscriptionTag = "")
    {
        $message = "Subscription '{$subscriptionTag}' not found.";

        parent::__construct($message);
    }
}

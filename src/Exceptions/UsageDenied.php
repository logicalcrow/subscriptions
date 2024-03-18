<?php

namespace Logicalcrow\Subscriptions\Exceptions;

class UsageDenied extends SubscriptionsException
{
    public function __construct($featureTag = '')
    {
        $message = "Usage of '{$featureTag}' has been denied.";

        parent::__construct($message);
    }
}

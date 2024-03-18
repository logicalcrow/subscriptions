<?php

declare(strict_types=1);

namespace Logicalcrow\Subscriptions\Services\PaymentMethods;

use Logicalcrow\Subscriptions\Contracts\PaymentMethodService;
use Logicalcrow\Subscriptions\Traits\IsPaymentMethod;

class Free implements PaymentMethodService
{
    use IsPaymentMethod;

    /**
     * Charge desired amount
     * @return void
     */
    public function charge()
    {
        // Nothing is charged, no exception is raised
    }
}

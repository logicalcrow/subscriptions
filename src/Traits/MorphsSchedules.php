<?php

namespace Logicalcrow\Subscriptions\Traits;

trait MorphsSchedules
{
    /**
     * Get all schedules.
     */
    public function schedules()
    {
        return $this->morphMany(config('subby.models.plan_subscription_schedule'), 'scheduleable');
    }
}

<?php

declare(strict_types=1);

namespace Logicalcrow\Subscriptions\Models;

use Logicalcrow\Subscriptions\Traits\BelongsToPlan;
use Logicalcrow\Subscriptions\Traits\HasResetDate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class PlanFeature extends Model
{
    use BelongsToPlan, HasResetDate;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'tag',
        'plan_id',
        'name',
        'description',
        'value',
        'resettable_period',
        'resettable_interval',
        'sort_order',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'tag' => 'string',
        'value' => 'string',
        'resettable_period' => 'integer',
        'resettable_interval' => 'string',
        'sort_order' => 'integer',
    ];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('logicalcrow.tables.plan_features'));
    }

    /**
     * Get validation rules
     * @return string[]
     */
    public function getRules(): array
    {
        return [
            'tag' => [
                'required',
                'max:150',
                Rule::unique(config('logicalcrow.tables.plan_features'))->where(function ($query) {
                    return $query->where('id', '!=', $this->id)->where('plan_id', $this->plan_id);
                }),
            ],
            'plan_id' => 'required|integer|exists:' . config('logicalcrow.tables.plans') . ',id',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:32768',
            'value' => 'required|string',
            'resettable_period' => 'sometimes|integer',
            'resettable_interval' => 'sometimes|in:hour,day,week,month',
            'sort_order' => 'nullable|integer|max:100000',
        ];
    }
}

<?php

namespace Exfriend\Discounter\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'expires_at',
    ];

    /**
     * Methods
     */
    function expired()
    {
        return $this->expires_at < now();
    }

    function getDiscountAmount( $price )
    {
        return round( $price - $this->discount_value, 2 );
    }

    function canBeAppliedToPeriod( $period )
    {
        if ( $period == 'yearly' && !$this->period_yearly )
        {
            return false;
        }

        if ( $period == 'monthly' && !$this->period_monthly )
        {
            return false;
        }

        return true;
    }
}
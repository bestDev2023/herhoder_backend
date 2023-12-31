<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'name',
        'coin_type',
        'network',
        'status',
        'is_withdrawal',
        'is_deposit',
        'is_buy',
        'is_sell',
        'coin_icon',
        'is_base',
        'is_currency',
        'is_primary',
        'is_wallet',
        'is_transferable',
        'is_virtual_amount',
        'trade_status',
        'sign',
        'minimum_buy_amount',
        'minimum_sell_amount',
        'minimum_withdrawal',
        'maximum_withdrawal',
        'maximum_buy_amount',
        'maximum_sell_amount',
        'max_send_limit',
        'withdrawal_fees',
        'withdrawal_fees_type',
        'coin_price',
        'admin_approval',
        'ico_id'
    ];

    public function setCoinTypeAttribute($value)
    {
        $this->attributes['coin_type'] = strtoupper($value);
    }
}

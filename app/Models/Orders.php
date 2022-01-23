<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 
        'fist_name',
        'last_name',
        'address',
        'phone',
        // 'lottery_id',
        // 'billing_lottery',
        // 'billing_lotType',
        // 'billing_lotYear',
        // 'billing_lotRound',
        // 'billing_lotSet',
        // 'billing_lotDate',
        'quantity',
        'total_price',
        'billing_slip_img',
        'payment',
        'status',
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function items()
    {
        return $this->hasMany(ordersProducts::class);
    }
}

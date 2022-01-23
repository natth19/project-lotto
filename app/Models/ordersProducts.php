<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ordersProducts extends Model
{
    use HasFactory;
    protected $table = 'orders_products';

    protected $fillable = [
        'order_id',
        'user_id',
        'lottery_id',
        'lottery_number',
        'lottery_type',
        'lottery_set',
        'lottery_round',
        'lottery_year',
        'lottery_date_forward',
        'lottery_img',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(DB::table('lottery'), 'id');
    }
}

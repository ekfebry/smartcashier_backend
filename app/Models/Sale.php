<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['member_id', 'total_amount', 'sale_date'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}

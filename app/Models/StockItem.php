<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'brand', 'model', 'name', 'type',
        'quantity', 'purchase_price', 'sale_price', 'supplier'
    ];

    public function orderServices()
    {
        return $this->belongsToMany(OrderService::class)->withPivot('quantity')->withTimestamps();
    }
}

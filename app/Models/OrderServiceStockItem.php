<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderServiceStockItem extends Model
{
    use HasFactory;

    protected $table = 'order_service_stock_items';

    protected $fillable = [
        'order_service_id',
        'stock_item_id',
        'quantity',
    ];

    public function orderService(): BelongsTo
    {
        return $this->belongsTo(OrderService::class);
    }

    public function stockItem(): BelongsTo
    {
        return $this->belongsTo(StockItem::class);
    }
}

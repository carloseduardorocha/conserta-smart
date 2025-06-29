<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['client_id', 'user_id', 'description', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stockItems()
    {
        return $this->belongsToMany(StockItem::class, 'order_service_stock_items')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}

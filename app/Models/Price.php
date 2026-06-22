<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Scope query untuk menyaring pricelist berdasarkan kategori pilihan admin
     */
    public function scopeFilterByCategory($query, $categoryFilter)
    {
        return $query->when($categoryFilter && $categoryFilter !== 'all', function ($q) use ($categoryFilter) {
            $q->where('category', $categoryFilter);
        });
    }
}

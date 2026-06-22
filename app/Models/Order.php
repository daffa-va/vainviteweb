<?php

namespace App\Models;

use App\Models\Price;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    /**
     * Scope query untuk pencarian gabungan nama/WA dan status kategori
     */
    public function scopeSearchFilter($query, $searchTerm, $statusFilter)
    {
        return $query->when($searchTerm, function ($q) use ($searchTerm) {
            $q->where(function ($sub) use ($searchTerm) {
                $sub->where('client_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('client_wa', 'like', '%' . $searchTerm . '%');
            });
        })->when($statusFilter && $statusFilter !== 'all', function ($q) use ($statusFilter) {
            $q->where('status', $statusFilter);
        });
    }
}

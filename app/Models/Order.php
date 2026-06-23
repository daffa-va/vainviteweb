<?php

namespace App\Models;

use App\Models\Price;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'price_id',
        'client_name',
        'client_wa',
        'total_price',
        'custom_note',
        'status',
        'theme_slug',
        'theme_name',
        'theme_category',
        'theme_link',
        'result_link',
        'has_photo',
        'deadline',
        'form_data',
    ];

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
                    ->orWhere('client_wa', 'like', '%' . $searchTerm . '%')
                    ->orWhere('theme_category', 'like', '%' . $searchTerm . '%');
            });
        })->when($statusFilter && $statusFilter !== 'all', function ($q) use ($statusFilter) {
            $q->where('status', $statusFilter);
        });
    }
}

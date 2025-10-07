<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['is_offer_valid'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'store_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'discount_type',
        'discount_value',
        'is_active'
    ];

    public function getIsOfferValidAttribute()
    {
        // test these value "start_date": "2025-08-08",
        //"end_date": "2025-08-09",
        $currentDate = now()->format('Y-m-d');
        $startDate =  $this->start_date;
        $endDate =    $this->end_date;
        $isValid = false;
        if ($this->is_active) {
            if ($currentDate <= $endDate) {
                $isValid = true;
            }
        }
        return $isValid;
    }
}

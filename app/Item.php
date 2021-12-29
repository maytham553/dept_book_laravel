<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";
    protected $fillable= [
        'customer_id',
        'name',
        'total_amount',
        'installment_amount',
        'date_of_payment',
        'note'
    ];

    /**
     * Get the customer that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function accountingEntry()
    {
        return $this->hasMany(AccountingEntry::class);
    }
  
}

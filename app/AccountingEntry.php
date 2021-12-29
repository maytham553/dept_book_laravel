<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingEntry extends Model
{
    protected $table = "accounting_entries";
    protected $fillable= [
        'item_id',
        'payment_amount',
        'payment_date',
        'note'
    ];

    /**
     * Get the item that owns the AccountingEntry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

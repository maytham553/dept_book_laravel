<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable= [
        'name',
        'phone',
        'max_dept',
        'note'
    ];

    /**
     * Get all of the comments for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}

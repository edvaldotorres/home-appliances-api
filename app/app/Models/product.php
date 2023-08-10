<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mark_id',
        'name',
        'description',
        'tension',
    ];

    /**
     * The "mark" function returns a BelongsTo relationship with the "Mark" class.
     * 
     * @return BelongsTo The method is returning a BelongsTo relationship.
     */
    public function mark(): BelongsTo
    {
        return $this->belongsTo(Mark::class);
    }
}

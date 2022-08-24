<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method whereDoesntHave(string $string, \Closure $param)
 * @method findOrFail(int $id)
 */
class Room extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function booking(): HasMany
    {
        return $this->hasMany(bookingReference::class);
    }


    public function isBooked($start, $end)
    {
        return $this->whereHas('booking', function (Builder $builder) use ($start, $end) {
            return $builder->whereBetween('from', [$start, $end])
                ->whereBetween('to', [$start, $end]);
        })->exists();
    }


    public function book($from, $to) : bookingReference
    {
        return $this->booking()->create(['from' => $from, 'to' => $to]);
    }
}

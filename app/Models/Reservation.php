<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'table_id',
        'reservation_date',
        'reservation_time',
        'guest_count',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'reservation_date' => 'date',
        ];
    }

    /**
     * Get the user that made the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the table reserved.
     */
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}

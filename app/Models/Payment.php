<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use Notifiable, HasFactory;
    protected $fillable = [
        'user_id',
        'bus_id',
        'name',
        'no_hp',
        'email',
        'method',
        'sheets',
        'total_price'
    ];

    /**
     * Get the user that owns the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
}

<?php

namespace App\Models;

use App\TicketStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'delivery_method', 'user_type', 'user_id', 'employee', 'status', 'price'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected function casts(): array
    {
        return [
            'status' => TicketStatus::class
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'text', 'dateTime',
    ];

    /**
     * Get the user that owns the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function psychologist(): BelongsTo
    {
        return $this->belongsTo(Psychologist::class, 'psychologist_id', 'id');
    }
}

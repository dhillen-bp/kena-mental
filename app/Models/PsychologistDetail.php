<?php

namespace App\Models;

use App\Models\Psychologist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PsychologistDetail extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'psychologist_id', 'university', 'year', 'degree', 'topics', 'sesion_count'
    ];

    /**
     * Get the user that owns the PsychologistDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psychologist(): BelongsTo
    {
        return $this->belongsTo(Psychologist::class, 'psychologist_id', 'id');
    }
}

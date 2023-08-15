<?php

namespace App\Models;

use App\Models\Consultation;
use App\Models\PsychologistDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Psychologist extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'photo',
    ];

    /**
     * Get the detail associated with the Psychologist
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function psychologistDetail(): HasOne
    {
        return $this->hasOne(PsychologistDetail::class);
    }

    /**
     * Get all of the comments for the Psychologist
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class, 'psychologist_id', 'id');
    }
}

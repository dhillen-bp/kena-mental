<?php

namespace App\Models;

use App\Models\PaymentConsultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded = [];

    /**
     * Get the user that owns the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function psychologists(): BelongsTo
    {
        return $this->belongsTo(Psychologist::class, 'psychologist_id', 'id');
    }

    /**
     * Get the user associated with the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentConsultation(): HasOne
    {
        return $this->hasOne(PaymentConsultation::class, 'consultation_id', 'id');
    }
}

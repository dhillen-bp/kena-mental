<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentConsultation extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'payment_consultation';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded = [];


    /**
     * Get the user that owns the 2023_08_16_110514_create_payment_consultation_table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultation(): BelongsTo
    {
        return $this->belongsTo(Consultation::class, 'consultation_id', 'id');
    }
}

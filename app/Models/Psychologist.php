<?php

namespace App\Models;

use App\Models\Testimonial;
use App\Models\Consultation;
use App\Models\PsychologistDetail;
use App\Models\PaymentConsultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Psychologist extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = true;

    protected $guarded = [];

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

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class, 'psychologist_id', 'id');
    }

    public function paymentConsultation(): HasMany
    {
        return $this->hasMany(PaymentConsultation::class, 'psychologist_id', 'id');
    }

    /**
     * Get the user associated with the Psychologist
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class, 'psychologist_id', 'id');
    }
}

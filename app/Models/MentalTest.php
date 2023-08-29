<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MentalTest extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'mental_tests';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = [];
    /**
     * Get all of the comments for the MentalTest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'test_id', 'id');
    }
}

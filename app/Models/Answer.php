<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'test_answers';
    protected $guarded = [];
    /**
     * Get the question that owns the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    /**
     * Get all of the results for the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function results(): HasMany
    {
        return $this->hasMany(ResultTest::class, 'answer_id', 'id');
    }
}

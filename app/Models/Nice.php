<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nice extends Model
{

    use SoftDeletes;
    protected $table = 'nices';

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function scopeUserIdAndWordId(Builder $query, $userId, $wordId)
    {
        return $query->where('user_id', $userId)
                        ->where('word_id', $wordId);
    }

}

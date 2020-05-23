<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{

    use SoftDeletes;
    protected $table = 'informations';

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function scopeOpenDate(Builder $query, $today)
    {
        return $query->where('open_date', '<=', $today);
    }

}

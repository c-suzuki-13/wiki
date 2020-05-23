<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{

    use SoftDeletes;
    protected $table = 'words';

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function nices()
    {
        return $this->hasMany('App\Models\Nice');
    }

    public function scopeUserId(Builder $query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeRecentlyWords(Builder $query)
    {
        $today = Carbon::today();
        return $query->where('created_at', '>=', $today->subDay(7));
    }

    public function scopeWordSearch(Builder $query, $keyword)
    {
        $keyword = '%' . $keyword . '%';
        return $query->where('title', 'like', $keyword)
                        ->orWhere('content', 'like', $keyword);
    }

}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;
    protected $table = 'comments';

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}

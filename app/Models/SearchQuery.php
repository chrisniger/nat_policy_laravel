<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchQuery extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = [
        'query',
        'result_count',
        'session_hash',
        'searched_at',
    ];

    protected function casts(): array
    {
        return [
            'searched_at' => 'datetime',
            'created_at' => 'datetime',
        ];
    }
}
